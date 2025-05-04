<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The products included in the plan.
 */
final class PlanItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The plan item type.
     */
    public string $type;

    /**
     * The product associated with the item.
     */
    public ?Product $product;

    /**
     * The price associated with the item.
     */
    public ?Price $price;

    public function __construct(
        ?string $type = null,
        ?Product $product = null,
        ?Price $price = null,
    ) {
        $this->type = $type ?? '';
        $this->product = $product ?? new Product();
        $this->price = $price ?? new Price();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'type' => $this->type,
            'product' => $this->product,
            'price' => $this->price,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'type'} ?? null,
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
        );
    }
}
