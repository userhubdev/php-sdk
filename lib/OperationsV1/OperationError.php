<?php

// Code generated. DO NOT EDIT.

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
    public null|string $code;

    /**
     * The error message.
     */
    public null|string $message;

    public function __construct(
        null|string $code = null,
        null|string $message = null,
    ) {
        $this->code = $code ?? null;
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

        return new OperationError(
            isset($data->{'code'}) ? $data->{'code'} : null,
            isset($data->{'message'}) ? $data->{'message'} : null,
        );
    }
}
