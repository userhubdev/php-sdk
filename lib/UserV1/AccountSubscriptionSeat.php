<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The user's seat information.
 */
final class AccountSubscriptionSeat implements \JsonSerializable, JsonUnserializable
{
    /**
     * The seat product.
     */
    public ?Product $product;

    public function __construct(
        ?Product $product = null,
    ) {
        $this->product = $product ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => $this->product,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
        );
    }
}
