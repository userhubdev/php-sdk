<?php

// Code generated. DO NOT EDIT.

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Operations metadata.
 */
class OperationInfo implements \JsonSerializable, JsonUnserializable
{
    /**
     * The message name of the primary return type for this operation.
     */
    public null|string $responseType;

    public function __construct(
        null|string $responseType = null,
    ) {
        $this->responseType = $responseType ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'responseType' => isset($this->responseType) ? $this->responseType : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new OperationInfo(
            isset($data->{'responseType'}) ? $data->{'responseType'} : null,
        );
    }
}
