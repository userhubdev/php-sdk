<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

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
     * client to securely set up a payment method, the result of which
     * can be passed to CreatePaymentMethod to complete the setup
     * process.
     */
    public string $token;

    public function __construct(
        null|string $token = null,
    ) {
        $this->token = $token ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'token' => $this->token ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'token'} ?? null,
        );
    }
}
