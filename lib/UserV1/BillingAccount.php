<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The billing account for an organization or user.
 */
class BillingAccount implements \JsonSerializable, JsonUnserializable
{
    /**
     * The status of the billing account.
     */
    public null|string $state;

    /**
     * The balance amount for the account.
     *
     * A negative value indicates an amount which will be subtracted from the next
     * invoice (credit).
     *
     * A positive value indicates an amount which will be added to the next
     * invoice (debt).
     */
    public null|string $balanceAmount;

    /**
     * The ISO-4217 currency code for the account (e.g. `USD`).
     */
    public null|string $currencyCode;

    /**
     * The default and latest 10 payment methods for the account.
     *
     * @var \UserHub\UserV1\PaymentMethod[]
     */
    public array $paymentMethods;

    /**
     * The subscription for the account.
     */
    public null|\UserHub\UserV1\Subscription $subscription;

    public function __construct(
        null|string $state = null,
        null|string $balanceAmount = null,
        null|string $currencyCode = null,
        null|array $paymentMethods = null,
        null|Subscription $subscription = null,
    ) {
        $this->state = $state ?? null;
        $this->balanceAmount = $balanceAmount ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->paymentMethods = $paymentMethods ?? [];
        $this->subscription = $subscription ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'state' => $this->state ?? null,
            'balanceAmount' => $this->balanceAmount ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'paymentMethods' => $this->paymentMethods ?? null,
            'subscription' => $this->subscription ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'state'} ?? null,
            $data->{'balanceAmount'} ?? null,
            $data->{'currencyCode'} ?? null,
            isset($data->{'paymentMethods'}) ? Util::mapArray($data->{'paymentMethods'}, [PaymentMethod::class, 'jsonUnserialize']) : null,
            isset($data->{'subscription'}) ? Subscription::jsonUnserialize($data->{'subscription'}) : null,
        );
    }
}
