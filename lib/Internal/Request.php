<?php

namespace UserHub\Internal;

use UserHub\UserHubError;

class Request
{
    public string $call;
    public string $method;
    public string $path;
    public ?CaseInsensitiveArray $headers;
    public ?array $query;
    public mixed $body;
    public int $attempt;
    public bool $idempotent;

    public function __construct(string $call, string $method, string $path)
    {
        $this->call = $call;
        $this->method = $method;
        $this->path = $path;
        $this->headers = null;
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
        if (empty($this->headers)) {
            $this->headers = new CaseInsensitiveArray();
        }
        $this->headers[$name] = $value;
    }

    public function setQuery(string $name, string $value): void
    {
        if (empty($this->query)) {
            $this->query = [];
        }
        $this->query[$name] = $value;
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
            if (isset($e->statusCode)) {
                if (429 === $e->statusCode) {
                    return true;
                }

                if ($this->idempotent) {
                    if ($e->statusCode >= 500 && $e->statusCode <= 599) {
                        return true;
                    }
                }
            }
        } elseif ($e instanceof CurlError) {
            if ($this->idempotent) {
                switch ($e->getCode()) {
                    case CURLE_COULDNT_CONNECT:
                        return true;

                    case CURLE_COULDNT_RESOLVE_HOST:
                        return true;

                    case CURLE_OPERATION_TIMEDOUT:
                        return true;
                }
            }
        }

        if ($e instanceof \Throwable) {
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
        if ($timeout > Constants::RETRY_MAX_SLEEP_MS) {
            $timeout = Constants::RETRY_MAX_SLEEP_MS;
        }

        return $timeout;
    }
}
