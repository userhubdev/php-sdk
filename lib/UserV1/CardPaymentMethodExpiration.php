<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The expiration date for the card.
 */
final class CardPaymentMethodExpiration implements \JsonSerializable, JsonUnserializable
{
    /**
     * The expiration year.
     */
    public int $year;

    /**
     * The expiration month.
     */
    public int $month;

    public function __construct(
        null|int $year = null,
        null|int $month = null,
    ) {
        $this->year = $year ?? 0;
        $this->month = $month ?? 0;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'year' => $this->year ?? null,
            'month' => $this->month ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'year'} ?? null,
            $data->{'month'} ?? null,
        );
    }
}
