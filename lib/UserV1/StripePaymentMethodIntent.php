<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A Stripe Setup Intent.
 */
final class StripePaymentMethodIntent implements \JsonSerializable, JsonUnserializable
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

    /**
     * The Stripe.js Payment Element options.
     *
     * @var array<string, mixed>
     */
    public array $paymentElementOptions;

    /**
     * @param null|array<string, mixed> $paymentElementOptions
     */
    public function __construct(
        ?string $accountId = null,
        ?bool $live = null,
        ?string $clientSecret = null,
        ?array $paymentElementOptions = null,
    ) {
        $this->accountId = $accountId ?? '';
        $this->live = $live ?? false;
        $this->clientSecret = $clientSecret ?? '';
        $this->paymentElementOptions = $paymentElementOptions ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'accountId' => $this->accountId ?? null,
            'live' => $this->live ?? null,
            'clientSecret' => $this->clientSecret ?? null,
            'paymentElementOptions' => $this->paymentElementOptions ?? null,
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
            isset($data->{'paymentElementOptions'}) ? (array) $data->{'paymentElementOptions'} : null,
        );
    }
}
