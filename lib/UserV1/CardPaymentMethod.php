<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A card payment method (e.g. credit, debit, etc...).
 */
class CardPaymentMethod implements \JsonSerializable, JsonUnserializable
{
    /**
     * The brand of the card (e.g. `VISA`).
     */
    public null|string $brand;

    /**
     * The expiration date of the card.
     */
    public null|\UserHub\UserV1\CardPaymentMethodExpiration $expiration;

    /**
     * The last for digits of the card.
     */
    public null|string $last4;

    /**
     * The funding method for the card (e.g. `DEBIT`).
     */
    public null|string $fundingType;

    public function __construct(
        null|string $brand = null,
        null|CardPaymentMethodExpiration $expiration = null,
        null|string $last4 = null,
        null|string $fundingType = null,
    ) {
        $this->brand = $brand ?? null;
        $this->expiration = $expiration ?? null;
        $this->last4 = $last4 ?? null;
        $this->fundingType = $fundingType ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'brand' => isset($this->brand) ? $this->brand : null,
            'expiration' => isset($this->expiration) ? $this->expiration : null,
            'last4' => isset($this->last4) ? $this->last4 : null,
            'fundingType' => isset($this->fundingType) ? $this->fundingType : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new CardPaymentMethod(
            isset($data->{'brand'}) ? $data->{'brand'} : null,
            isset($data->{'expiration'}) ? CardPaymentMethodExpiration::jsonUnserialize($data->{'expiration'}) : null,
            isset($data->{'last4'}) ? $data->{'last4'} : null,
            isset($data->{'fundingType'}) ? $data->{'fundingType'} : null,
        );
    }
}
