<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The plan information.
 */
class AccountSubscriptionPlan implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the plan.
     */
    public string $id;

    /**
     * The human-readable display name of the plan.
     */
    public string $displayName;

    /**
     * The plan product.
     */
    public null|AccountSubscriptionProduct $product;

    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|AccountSubscriptionProduct $product = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? '';
        $this->product = $product ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'displayName' => $this->displayName ?? null,
            'product' => $this->product ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'displayName'} ?? null,
            isset($data->{'product'}) ? AccountSubscriptionProduct::jsonUnserialize($data->{'product'}) : null,
        );
    }
}
