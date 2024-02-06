<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The products which the plan group includes.
 */
class PlanGroupRevisionItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The product associated with the item.
     */
    public null|\UserHub\AdminV1\Product $product;

    /**
     * The plan item type.
     */
    public string $type;

    public function __construct(
        null|Product $product = null,
        null|string $type = null,
    ) {
        $this->product = $product ?? null;
        $this->type = $type ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => isset($this->product) ? $this->product : null,
            'type' => isset($this->type) ? $this->type : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PlanGroupRevisionItem(
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            isset($data->{'type'}) ? $data->{'type'} : null,
        );
    }
}
