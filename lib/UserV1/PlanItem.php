<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The products which the plan includes.
 */
class PlanItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The product associated with the item.
     */
    public null|\UserHub\UserV1\Product $product;

    /**
     * The price associated with them item.
     */
    public null|\UserHub\UserV1\Price $price;

    /**
     * The plan item type.
     */
    public string $type;

    public function __construct(
        null|Product $product = null,
        null|Price $price = null,
        null|string $type = null,
    ) {
        $this->product = $product ?? null;
        $this->price = $price ?? null;
        $this->type = $type ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => $this->product ?? null,
            'price' => $this->price ?? null,
            'type' => $this->type ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
            $data->{'type'} ?? null,
        );
    }
}
