<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

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
     * The item product.
     */
    public null|Product $product;

    /**
     * The item price.
     */
    public null|Price $price;

    /**
     * The quantity of products.
     */
    public int $quantity;

    public function __construct(
        null|string $id = null,
        null|Product $product = null,
        null|Price $price = null,
        null|int $quantity = null,
    ) {
        $this->id = $id ?? '';
        $this->product = $product ?? new Product();
        $this->price = $price ?? null;
        $this->quantity = $quantity ?? 0;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'product' => $this->product ?? null,
            'price' => $this->price ?? null,
            'quantity' => $this->quantity ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
            $data->{'quantity'} ?? null,
        );
    }
}
