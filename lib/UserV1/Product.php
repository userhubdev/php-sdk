<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The product.
 */
final class Product implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the product.
     */
    public string $id;

    /**
     * The client defined unique identifier of the product.
     */
    public null|string $uniqueId;

    /**
     * The human-readable display name of the product.
     */
    public string $displayName;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'displayName' => $this->displayName ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'uniqueId'} ?? null,
            $data->{'displayName'} ?? null,
        );
    }
}
