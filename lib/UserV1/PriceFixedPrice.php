<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A pricing strategy that defines a constant price per
 * quantity.
 */
final class PriceFixedPrice implements \JsonSerializable, JsonUnserializable
{
    /**
     * The decimal amount for the defined currency (e.g. `9.95`).
     */
    public string $amount;

    /**
     * Whether to transform the quantity before multiplying amount.
     */
    public null|PriceTransformQuantity $transformQuantity;

    public function __construct(
        null|string $amount = null,
        null|PriceTransformQuantity $transformQuantity = null,
    ) {
        $this->amount = $amount ?? '';
        $this->transformQuantity = $transformQuantity ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'amount' => $this->amount ?? null,
            'transformQuantity' => $this->transformQuantity ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'amount'} ?? null,
            isset($data->{'transformQuantity'}) ? PriceTransformQuantity::jsonUnserialize($data->{'transformQuantity'}) : null,
        );
    }
}
