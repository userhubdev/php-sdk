<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A quantity transform for fixed prices.
 */
class PriceTransformQuantity implements \JsonSerializable, JsonUnserializable
{
    /**
     * The amount to divide the quantity by.
     */
    public int $divisor;

    /**
     * Whether to round the result up or down.
     */
    public string $round;

    public function __construct(
        null|int $divisor = null,
        null|string $round = null,
    ) {
        $this->divisor = $divisor ?? 0;
        $this->round = $round ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'divisor' => $this->divisor ?? null,
            'round' => $this->round ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'divisor'} ?? null,
            $data->{'round'} ?? null,
        );
    }
}
