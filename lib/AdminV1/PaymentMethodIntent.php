<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Configuration for setting up a payment method.
 */
final class PaymentMethodIntent implements \JsonSerializable, JsonUnserializable
{
    /**
     * A Stripe Setup Intent.
     */
    public ?StripePaymentMethodIntent $stripe;

    public function __construct(
        ?StripePaymentMethodIntent $stripe = null,
    ) {
        $this->stripe = $stripe ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'stripe' => $this->stripe,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'stripe'}) ? StripePaymentMethodIntent::jsonUnserialize($data->{'stripe'}) : null,
        );
    }
}
