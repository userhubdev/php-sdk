<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The complete payment step details.
 */
final class CheckoutCompletePaymentStep implements \JsonSerializable, JsonUnserializable
{
    /**
     * The payment intent for the checkout.
     */
    public ?PaymentIntent $paymentIntent;

    public function __construct(
        ?PaymentIntent $paymentIntent = null,
    ) {
        $this->paymentIntent = $paymentIntent ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'paymentIntent' => $this->paymentIntent,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'paymentIntent'}) ? PaymentIntent::jsonUnserialize($data->{'paymentIntent'}) : null,
        );
    }
}
