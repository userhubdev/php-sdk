<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Configuration for setting up a payment method.
 */
class PaymentMethodIntent implements \JsonSerializable, JsonUnserializable
{
    /**
     * A Stripe Setup Intent.
     */
    public null|\UserHub\UserV1\StripePaymentMethodIntent $stripe;

    public function __construct(
        null|StripePaymentMethodIntent $stripe = null,
    ) {
        $this->stripe = $stripe ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'stripe' => isset($this->stripe) ? $this->stripe : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PaymentMethodIntent(
            isset($data->{'stripe'}) ? StripePaymentMethodIntent::jsonUnserialize($data->{'stripe'}) : null,
        );
    }
}
