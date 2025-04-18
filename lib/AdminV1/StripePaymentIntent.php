<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A Stripe payment intent.
 */
final class StripePaymentIntent implements \JsonSerializable, JsonUnserializable
{
    /**
     * The Stripe account ID (e.g. `acct_1LcUvxQYGbxD2SPK`).
     */
    public string $accountId;

    /**
     * Whether the Stripe payment intent was created in live mode.
     */
    public bool $live;

    /**
     * The Stripe payment intent client secret.
     */
    public string $clientSecret;

    public function __construct(
        ?string $accountId = null,
        ?bool $live = null,
        ?string $clientSecret = null,
    ) {
        $this->accountId = $accountId ?? '';
        $this->live = $live ?? false;
        $this->clientSecret = $clientSecret ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'accountId' => $this->accountId,
            'live' => $this->live,
            'clientSecret' => $this->clientSecret,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'accountId'} ?? null,
            $data->{'live'} ?? null,
            $data->{'clientSecret'} ?? null,
        );
    }
}
