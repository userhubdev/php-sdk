<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Response message for CreatePaymentMethodIntent.
 */
class CreatePaymentMethodIntentResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The setup token for the billing system (e.g. Stripe SetupIntent
     * Client Secret). This is generally used by a frontend
     * client to securely setup a payment method, the result of which
     * can be passed to CreatePaymentMethod to complete the setup
     * process.
     */
    public null|string $token;

    public function __construct(
        null|string $token = null,
    ) {
        $this->token = $token ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'token' => isset($this->token) ? $this->token : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new CreatePaymentMethodIntentResponse(
            isset($data->{'token'}) ? $data->{'token'} : null,
        );
    }
}
