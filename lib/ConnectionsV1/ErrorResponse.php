<?php

// Code generated. DO NOT EDIT.

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The connection error response.
 */
class ErrorResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The error code (e.g. `INVALID_ARGUMENT`).
     */
    public string $code;

    /**
     * A user-facing error message.
     */
    public null|string $message;

    public function __construct(
        null|string $code = null,
        null|string $message = null,
    ) {
        $this->code = $code ?? '';
        $this->message = $message ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'code' => isset($this->code) ? $this->code : null,
            'message' => isset($this->message) ? $this->message : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new ErrorResponse(
            isset($data->{'code'}) ? $data->{'code'} : null,
            isset($data->{'message'}) ? $data->{'message'} : null,
        );
    }
}
