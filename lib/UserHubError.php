<?php

declare(strict_types=1);

namespace UserHub;

use UserHub\ApiV1\Status;

class UserHubError extends \Exception
{
    protected ?string $apiCode;
    protected ?string $reason;
    protected ?string $param;
    protected ?object $metadata;
    protected ?string $call;
    protected ?int $statusCode;

    public function __construct(
        ?string $message = null,
        ?string $call = null,
        ?Status $status = null,
        ?int $statusCode = null,
        ?\Throwable $previous = null,
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

        $this->call = empty($call) ? null : $call;
        $this->statusCode = empty($statusCode) ? null : $statusCode;

        if (isset($status)) {
            $this->apiCode = $status->code;
            $this->reason = empty($status->reason) ? null : $status->reason;
            $this->param = empty($status->param) ? null : $status->param;
            $this->metadata = empty($metadata) ? null : $metadata;
        } else {
            $this->apiCode = null;
            $this->reason = null;
            $this->param = null;
            $this->metadata = null;
        }
    }

    public function __toString(): string
    {
        $parts = [];

        if (!empty($this->call)) {
            $parts[] = "call: {$this->call}";
        }

        $hasApiCode = isset($this->apiCode) && 'UNKNOWN' !== $this->apiCode;

        if ($hasApiCode) {
            $parts[] = "apiCode: {$this->apiCode}";
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

    public function getApiCode(): string
    {
        return empty($this->apiCode) ? 'UNKNOWN' : $this->apiCode;
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
}
