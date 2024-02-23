<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\OperationsV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The operation error.
 */
class OperationError implements \JsonSerializable, JsonUnserializable
{
    /**
     * The error code.
     */
    public string $code;

    /**
     * The error message.
     */
    public string $message;

    public function __construct(
        null|string $code = null,
        null|string $message = null,
    ) {
        $this->code = $code ?? '';
        $this->message = $message ?? '';
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
