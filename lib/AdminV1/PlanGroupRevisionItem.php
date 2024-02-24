<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The products which the plan group includes.
 */
final class PlanGroupRevisionItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The product associated with the item.
     */
    public null|Product $product;

    /**
     * The plan item type.
     */
    public string $type;

    public function __construct(
        null|Product $product = null,
        null|string $type = null,
    ) {
        $this->product = $product ?? new Product();
        $this->type = $type ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => $this->product ?? null,
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
            $data->{'type'} ?? null,
        );
    }
}
