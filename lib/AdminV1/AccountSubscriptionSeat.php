<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The user's seat information.
 */
class AccountSubscriptionSeat implements \JsonSerializable, JsonUnserializable
{
    /**
     * The seat product.
     */
    public null|AccountSubscriptionProduct $product;

    public function __construct(
        null|AccountSubscriptionProduct $product = null,
    ) {
        $this->product = $product ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => $this->product ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'product'}) ? AccountSubscriptionProduct::jsonUnserialize($data->{'product'}) : null,
        );
    }
}
