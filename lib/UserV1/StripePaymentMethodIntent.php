<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A Stripe Setup Intent.
 */
class StripePaymentMethodIntent implements \JsonSerializable, JsonUnserializable
{
    /**
     * The Stripe account ID (e.g. `acct_1LcUvxQYGbxD2SPK`).
     */
    public string $accountId;

    /**
     * Whether the Stripe Setup Intent was created in live mode.
     */
    public bool $live;

    /**
     * The Stripe Setup Intent client secret.
     */
    public string $clientSecret;

    public function __construct(
        null|string $accountId = null,
        null|bool $live = null,
        null|string $clientSecret = null,
    ) {
        $this->accountId = $accountId ?? '';
        $this->live = $live ?? false;
        $this->clientSecret = $clientSecret ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'accountId' => isset($this->accountId) ? $this->accountId : null,
            'live' => isset($this->live) ? $this->live : null,
            'clientSecret' => isset($this->clientSecret) ? $this->clientSecret : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new StripePaymentMethodIntent(
            isset($data->{'accountId'}) ? $data->{'accountId'} : null,
            isset($data->{'live'}) ? $data->{'live'} : null,
            isset($data->{'clientSecret'}) ? $data->{'clientSecret'} : null,
        );
    }
}
