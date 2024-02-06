<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

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
            'divisor' => isset($this->divisor) ? $this->divisor : null,
            'round' => isset($this->round) ? $this->round : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PriceTransformQuantity(
            isset($data->{'divisor'}) ? $data->{'divisor'} : null,
            isset($data->{'round'}) ? $data->{'round'} : null,
        );
    }
}
