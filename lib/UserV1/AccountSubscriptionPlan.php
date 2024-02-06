<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The plan information.
 */
class AccountSubscriptionPlan implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the plan.
     */
    public null|string $id;

    /**
     * The human-readable display name of the plan.
     */
    public null|string $displayName;

    /**
     * The plan product.
     */
    public null|\UserHub\UserV1\Product $product;

    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|Product $product = null,
    ) {
        $this->id = $id ?? null;
        $this->displayName = $displayName ?? null;
        $this->product = $product ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'product' => isset($this->product) ? $this->product : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new AccountSubscriptionPlan(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
        );
    }
}
