<?php

// Code generated. DO NOT EDIT.

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
            'id' => isset($this->id) ? $this->id : null,
            'uniqueId' => isset($this->uniqueId) ? $this->uniqueId : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new AccountSubscriptionProduct(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'uniqueId'}) ? $data->{'uniqueId'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
        );
    }
}
