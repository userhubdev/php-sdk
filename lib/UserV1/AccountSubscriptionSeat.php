<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The user's seat information.
 */
class AccountSubscriptionSeat implements \JsonSerializable, JsonUnserializable
{
    /**
     * The seat product.
     */
    public null|\UserHub\UserV1\Product $product;

    public function __construct(
        null|Product $product = null,
    ) {
        $this->product = $product ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => isset($this->product) ? $this->product : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new AccountSubscriptionSeat(
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
        );
    }
}
