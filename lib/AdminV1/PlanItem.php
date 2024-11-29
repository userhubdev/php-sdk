<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The plan products.
 */
final class PlanItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The product associated with the item.
     */
    public ?Product $product;

    /**
     * The price associated with them item.
     */
    public ?Price $price;

    /**
     * The plan item type.
     */
    public string $type;

    public function __construct(
        ?Product $product = null,
        ?Price $price = null,
        ?string $type = null,
    ) {
        $this->product = $product ?? new Product();
        $this->price = $price ?? new Price();
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
