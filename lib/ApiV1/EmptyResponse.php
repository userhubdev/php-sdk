<?php

// Code generated. DO NOT EDIT.

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Empty response.
 */
class EmptyResponse implements \JsonSerializable, JsonUnserializable
{
    public function __construct(
    ) {}

    public function jsonSerialize(): mixed
    {
        return (object) [
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new EmptyResponse(
        );
    }
}
