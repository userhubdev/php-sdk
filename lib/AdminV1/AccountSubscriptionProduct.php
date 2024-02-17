<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The subscription product.
 */
class AccountSubscriptionProduct implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the product.
     */
    public null|string $id;

    /**
     * The client defined unique identifier of the product.
     */
    public null|string $uniqueId;

    /**
     * The human-readable display name of the product.
     */
    public null|string $displayName;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
    ) {
        $this->id = $id ?? null;
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? null;
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
