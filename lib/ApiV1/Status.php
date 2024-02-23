<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The full API error.
 */
class Status implements \JsonSerializable, JsonUnserializable
{
    /**
     * The general error code (e.g. `INVALID_ARGUMENT`).
     */
    public string $code;

    /**
     * A developer-facing error message.
     */
    public string $message;

    /**
     * A reason code for the error (e.g. `USER_PENDING_DELETION`).
     */
    public null|string $reason;

    /**
     * The parameter path related to the error (e.g. `member.userId`).
     */
    public null|string $param;

    /**
     * Additional metadata related to the error.
     *
     * @var object<string, string>
     */
    public object $metadata;

    public function __construct(
        null|string $code = null,
        null|string $message = null,
        null|string $reason = null,
        null|string $param = null,
        null|object $metadata = null,
    ) {
        $this->code = $code ?? '';
        $this->message = $message ?? '';
        $this->reason = $reason ?? null;
        $this->param = $param ?? null;
        $this->metadata = $metadata ?? (object) [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'code' => $this->code ?? null,
            'message' => $this->message ?? null,
            'reason' => $this->reason ?? null,
            'param' => $this->param ?? null,
            'metadata' => $this->metadata ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'code'} ?? null,
            $data->{'message'} ?? null,
            $data->{'reason'} ?? null,
            $data->{'param'} ?? null,
            $data->{'metadata'} ?? null,
        );
    }
}
