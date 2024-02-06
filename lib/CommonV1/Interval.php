<?php

// Code generated. DO NOT EDIT.

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A time interval.
 */
class Interval implements \JsonSerializable, JsonUnserializable
{
    /**
     * The interval quantity.
     */
    public int $quantity;

    /**
     * The interval unit.
     */
    public string $unit;

    public function __construct(
        null|int $quantity = null,
        null|string $unit = null,
    ) {
        $this->quantity = $quantity ?? 0;
        $this->unit = $unit ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'quantity' => isset($this->quantity) ? $this->quantity : null,
            'unit' => isset($this->unit) ? $this->unit : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Interval(
            isset($data->{'quantity'}) ? $data->{'quantity'} : null,
            isset($data->{'unit'}) ? $data->{'unit'} : null,
        );
    }
}
