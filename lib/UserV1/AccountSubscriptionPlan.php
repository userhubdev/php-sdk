<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The plan information.
 */
final class AccountSubscriptionPlan implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the plan.
     */
    public string $id;

    /**
     * The client defined unique identifier of the plan.
     */
    public ?string $uniqueId;

    /**
     * The human-readable display name of the plan.
     */
    public string $displayName;

    /**
     * The plan product.
     */
    public ?Product $product;

    public function __construct(
        ?string $id = null,
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?Product $product = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
        $this->product = $product ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'uniqueId' => $this->uniqueId,
            'displayName' => $this->displayName,
            'product' => $this->product,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'uniqueId'} ?? null,
            $data->{'displayName'} ?? null,
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
        );
    }
}
