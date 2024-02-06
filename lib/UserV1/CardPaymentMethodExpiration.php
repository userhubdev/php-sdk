<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The expiration date for the card.
 */
class CardPaymentMethodExpiration implements \JsonSerializable, JsonUnserializable
{
    /**
     * The expiration year.
     */
    public null|int $year;

    /**
     * The expiration month.
     */
    public null|int $month;

    public function __construct(
        null|int $year = null,
        null|int $month = null,
    ) {
        $this->year = $year ?? null;
        $this->month = $month ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'year' => isset($this->year) ? $this->year : null,
            'month' => isset($this->month) ? $this->month : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new CardPaymentMethodExpiration(
            isset($data->{'year'}) ? $data->{'year'} : null,
            isset($data->{'month'}) ? $data->{'month'} : null,
        );
    }
}
