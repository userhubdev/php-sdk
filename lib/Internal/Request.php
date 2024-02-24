<?php

declare(strict_types=1);

namespace UserHub\Internal;

use UserHub\UserHubError;

/**
 * @internal
 */
final class Request
{
    public string $call;
    public string $method;
    public string $path;
    public Headers $headers;

    /**
     * @var null|array<string, string>
     */
    public ?array $query;
    public mixed $body;
    public int $attempt;
    public bool $idempotent;

    public function __construct(string $call, string $method, string $path)
    {
        $this->call = $call;
        $this->method = $method;
        $this->path = $path;
        $this->headers = new Headers();
        $this->query = null;
        $this->body = null;
        $this->attempt = 0;
        $this->idempotent = false;
    }

    public function setIdempotent(bool $idempotent): void
    {
        $this->idempotent = $idempotent;
    }

    public function setHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    public function setQuery(string $name, mixed $value): void
    {
        if (empty($this->query)) {
            $this->query = [];
        }

        if (!isset($value)) {
            $value = '';
        } elseif (\is_bool($value)) {
            $value = $value ? 'true' : 'false';
        } elseif ($value instanceof \DateTimeInterface) {
            $value = Util::encodeDateTime($value);
        } elseif (\is_float($value) || \is_int($value)) {
            $value = (string) $value;
        }

        if (\is_string($value)) {
            $this->query[$name] = $value;
        } else {
            throw new \TypeError('Got unexpected value: '.\gettype($value));
        }
    }

    public function setBody(mixed $body): void
    {
        $this->body = $body;
    }

    public function shouldRetry(?\Throwable $e): bool
    {
        if (!isset($e)) {
            return false;
        }

        if ($e instanceof UserHubError) {
            $statusCode = $e->getStatusCode();

            if (isset($statusCode)) {
                if (429 === $statusCode) {
                    return true;
                }

                if ($this->idempotent) {
                    if ($statusCode >= 500 && $statusCode <= 599) {
                        return true;
                    }
                }
            }
        } elseif ($e instanceof CurlError) {
            if ($this->idempotent) {
                switch ($e->getCode()) {
                    case CURLE_OPERATION_TIMEDOUT:
                    case CURLE_COULDNT_RESOLVE_HOST:
                    case CURLE_COULDNT_CONNECT:
                        return true;
                }
            }
        }

        if ($e->getPrevious() instanceof \Throwable) {
            return $this->shouldRetry($e->getPrevious());
        }

        return false;
    }

    public function retry(\Throwable $e): ?int
    {
        if ($this->attempt > Constants::RETRY_MAX_ATTEMPTS) {
            return null;
        }

        if (!$this->shouldRetry($e)) {
            return null;
        }

        $timeout = (2 ** ($this->attempt - 1)) * Constants::RETRY_MULTIPLIER_MS;
        // @phpstan-ignore-next-line
        if ($timeout > Constants::RETRY_MAX_SLEEP_MS) {
            $timeout = Constants::RETRY_MAX_SLEEP_MS;
        }

        return $timeout;
    }
}
