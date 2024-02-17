<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * An object to track payments.
 */
class PaymentIntent implements \JsonSerializable, JsonUnserializable
{
    /**
     * A Stripe payment intent.
     */
    public null|\UserHub\UserV1\StripePaymentIntent $stripe;

    public function __construct(
        null|StripePaymentIntent $stripe = null,
    ) {
        $this->stripe = $stripe ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'stripe' => $this->stripe ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'stripe'}) ? StripePaymentIntent::jsonUnserialize($data->{'stripe'}) : null,
        );
    }
}
