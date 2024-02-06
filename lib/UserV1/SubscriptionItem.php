<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The subscription items.
 */
class SubscriptionItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the item.
     */
    public string $id;

    /**
     * The details of the associated product.
     */
    public null|\UserHub\UserV1\Product $product;

    /**
     * The details of the associated price.
     */
    public null|\UserHub\UserV1\Price $price;

    /**
     * The quantity for the item.
     */
    public int $quantity;

    public function __construct(
        null|string $id = null,
        null|Product $product = null,
        null|Price $price = null,
        null|int $quantity = null,
    ) {
        $this->id = $id ?? '';
        $this->product = $product ?? null;
        $this->price = $price ?? null;
        $this->quantity = $quantity ?? 0;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'product' => isset($this->product) ? $this->product : null,
            'price' => isset($this->price) ? $this->price : null,
            'quantity' => isset($this->quantity) ? $this->quantity : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new SubscriptionItem(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
            isset($data->{'quantity'}) ? $data->{'quantity'} : null,
        );
    }
}
