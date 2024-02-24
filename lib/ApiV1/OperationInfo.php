<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Operations metadata.
 */
final class OperationInfo implements \JsonSerializable, JsonUnserializable
{
    /**
     * The message name of the primary return type for this operation.
     */
    public string $responseType;

    public function __construct(
        null|string $responseType = null,
    ) {
        $this->responseType = $responseType ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'responseType' => $this->responseType ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'responseType'} ?? null,
        );
    }
}
