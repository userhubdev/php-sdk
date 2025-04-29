<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

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
     * The expiration date of the card.
     *
     * @deprecated use `expYear` and `expMonth` instead
     */
    public ?CardPaymentMethodExpiration $expiration;

    /**
     * The last for digits of the card.
     */
    public string $last4;

    /**
     * The funding method for the card (e.g. `DEBIT`).
     */
    public string $fundingType;

    /**
     * The expiration year.
     */
    public int $expYear;

    /**
     * The expiration month.
     */
    public int $expMonth;

    public function __construct(
        ?string $brand = null,
        ?CardPaymentMethodExpiration $expiration = null,
        ?string $last4 = null,
        ?string $fundingType = null,
        ?int $expYear = null,
        ?int $expMonth = null,
    ) {
        $this->brand = $brand ?? '';
        $this->expiration = $expiration ?? null;
        $this->last4 = $last4 ?? '';
        $this->fundingType = $fundingType ?? '';
        $this->expYear = $expYear ?? 0;
        $this->expMonth = $expMonth ?? 0;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'brand' => $this->brand,
            'expiration' => $this->expiration,
            'last4' => $this->last4,
            'fundingType' => $this->fundingType,
            'expYear' => $this->expYear,
            'expMonth' => $this->expMonth,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'brand'} ?? null,
            isset($data->{'expiration'}) ? CardPaymentMethodExpiration::jsonUnserialize($data->{'expiration'}) : null,
            $data->{'last4'} ?? null,
            $data->{'fundingType'} ?? null,
            $data->{'expYear'} ?? null,
            $data->{'expMonth'} ?? null,
        );
    }
}
