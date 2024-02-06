<?php

// Code generated. DO NOT EDIT.

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
    public null|string $code;

    /**
     * A developer-facing error message.
     */
    public null|string $message;

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
        $this->code = $code ?? null;
        $this->message = $message ?? null;
        $this->reason = $reason ?? null;
        $this->param = $param ?? null;
        $this->metadata = $metadata ?? (object) [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'code' => isset($this->code) ? $this->code : null,
            'message' => isset($this->message) ? $this->message : null,
            'reason' => isset($this->reason) ? $this->reason : null,
            'param' => isset($this->param) ? $this->param : null,
            'metadata' => isset($this->metadata) ? $this->metadata : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Status(
            isset($data->{'code'}) ? $data->{'code'} : null,
            isset($data->{'message'}) ? $data->{'message'} : null,
            isset($data->{'reason'}) ? $data->{'reason'} : null,
            isset($data->{'param'}) ? $data->{'param'} : null,
            isset($data->{'metadata'}) ? $data->{'metadata'} : null,
        );
    }
}
