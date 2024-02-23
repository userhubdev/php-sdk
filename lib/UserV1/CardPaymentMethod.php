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
     * The expiration date of the card.
     */
    public null|CardPaymentMethodExpiration $expiration;

    /**
     * The last for digits of the card.
     */
    public string $last4;

    /**
     * The funding method for the card (e.g. `DEBIT`).
     */
    public string $fundingType;

    public function __construct(
        null|string $brand = null,
        null|CardPaymentMethodExpiration $expiration = null,
        null|string $last4 = null,
        null|string $fundingType = null,
    ) {
        $this->brand = $brand ?? '';
        $this->expiration = $expiration ?? null;
        $this->last4 = $last4 ?? '';
        $this->fundingType = $fundingType ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'brand' => $this->brand ?? null,
            'expiration' => $this->expiration ?? null,
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
            isset($data->{'expiration'}) ? CardPaymentMethodExpiration::jsonUnserialize($data->{'expiration'}) : null,
            $data->{'last4'} ?? null,
            $data->{'fundingType'} ?? null,
        );
    }
}
