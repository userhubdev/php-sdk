<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A card payment method (e.g. credit, debit, etc...).
 */
final class CardPaymentMethod implements \JsonSerializable, JsonUnserializable
{
    /**
     * The brand of the card (e.g. `VISA`).
     */
    public string $brand;

    /**
     * The expiration year.
     */
    public int $expYear;

    /**
     * The expiration month.
     */
    public int $expMonth;

    /**
     * The last for digits of the card.
     */
    public string $last4;

    /**
     * The funding method for the card (e.g. `DEBIT`).
     */
    public string $fundingType;

    public function __construct(
        ?string $brand = null,
        ?int $expYear = null,
        ?int $expMonth = null,
        ?string $last4 = null,
        ?string $fundingType = null,
    ) {
        $this->brand = $brand ?? '';
        $this->expYear = $expYear ?? 0;
        $this->expMonth = $expMonth ?? 0;
        $this->last4 = $last4 ?? '';
        $this->fundingType = $fundingType ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'brand' => $this->brand ?? null,
            'expYear' => $this->expYear ?? null,
            'expMonth' => $this->expMonth ?? null,
            'last4' => $this->last4 ?? null,
            'fundingType' => $this->fundingType ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'brand'} ?? null,
            $data->{'expYear'} ?? null,
            $data->{'expMonth'} ?? null,
            $data->{'last4'} ?? null,
            $data->{'fundingType'} ?? null,
        );
    }
}
