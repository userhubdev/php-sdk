<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

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
            'code' => $this->code ?? null,
            'message' => $this->message ?? null,
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
        );
    }
}
