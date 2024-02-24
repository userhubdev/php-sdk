<?php

declare(strict_types=1);

namespace UserHub;

use UserHub\ApiV1\Status;

class UserHubError extends \Exception implements \JsonSerializable
{
    protected null|Code $apiCode = null;
    protected null|string $reason = null;
    protected null|string $param = null;
    protected null|object $metadata = null;
    protected null|string $call = null;
    protected null|int $statusCode = null;

    public function __construct(
        null|string $message = null,
        null|Code $apiCode = null,
        null|string $reason = null,
        null|string $param = null,
        null|object $metadata = null,
        null|string $call = null,
        null|int $statusCode = null,
        null|Status $status = null,
        null|\Throwable $previous = null,
    ) {
        if (empty($message)) {
            if (isset($status)) {
                $message = $status->message;
            }
            if (empty($message)) {
                $message = '<no message>';
            }
        }

        parent::__construct($message, 0, $previous);

        if (!empty($call)) {
            $this->call = $call;
        }
        if (!empty($statusCode)) {
            $this->statusCode = $statusCode;
        }

        if (isset($status)) {
            if (isset($status->code)) {
                $this->apiCode = Code::tryFrom($status->code);
            }
            if (!empty($status->reason)) {
                $this->reason = $status->reason;
            }
            if (!empty($status->param)) {
                $this->param = $status->param;
            }
            if (!empty($metadata)) {
                $this->metadata = $metadata;
            }
        }

        if (isset($apiCode)) {
            $this->apiCode = $apiCode;
        }
        if (!empty($reason)) {
            $this->reason = $reason;
        }
        if (!empty($param)) {
            $this->param = $param;
        }
        if (!empty($metadata)) {
            $this->metadata = $metadata;
        }
    }

    public function __toString(): string
    {
        $parts = [];

        if (!empty($this->call)) {
            $parts[] = "call: {$this->call}";
        }

        $hasApiCode = isset($this->apiCode) && Code::Unknown !== $this->apiCode;

        if ($hasApiCode) {
            // @phpstan-ignore-next-line
            $parts[] = "apiCode: {$this->apiCode->value}";
        }

        if (!empty($this->reason)) {
            $parts[] = "reason: {$this->reason}";
        }

        if (!empty($this->param)) {
            $parts[] = "param: {$this->param}";
        }

        if (!$hasApiCode && !empty($this->statusCode)) {
            $parts[] = "statusCode: {$this->statusCode}";
        }

        $text = 'UserHubError: '.$this->message;

        if (!empty($parts)) {
            $text .= ' ('.implode(', ', $parts).')';
        }

        return $text;
    }

    public function getApiCode(): Code
    {
        return empty($this->apiCode) ? Code::Unknown : $this->apiCode;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getParam(): ?string
    {
        return $this->param;
    }

    public function getMetadata(): object
    {
        if (!empty($this->metadata)) {
            return (object) (new \ArrayObject($this->metadata))->getArrayCopy();
        }

        return (object) [];
    }

    public function getCall(): ?string
    {
        return $this->call;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'code' => $this->getApiCode(),
            'message' => $this->getMessage(),
        ];
    }
}
