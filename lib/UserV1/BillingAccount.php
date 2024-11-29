<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The billing account for an organization or user.
 */
final class BillingAccount implements \JsonSerializable, JsonUnserializable
{
    /**
     * The status of the billing account.
     */
    public string $state;

    /**
     * The balance amount for the account.
     *
     * A negative value indicates an amount which will be subtracted from the next
     * invoice (credit).
     *
     * A positive value indicates an amount which will be added to the next
     * invoice (debt).
     */
    public ?string $balanceAmount;

    /**
     * The ISO-4217 currency code for the account (e.g. `USD`).
     */
    public ?string $currencyCode;

    /**
     * The default and latest 10 payment methods for the account.
     *
     * @var PaymentMethod[]
     */
    public array $paymentMethods;

    /**
     * The subscription for the account.
     */
    public ?Subscription $subscription;

    /**
     * @param null|PaymentMethod[] $paymentMethods
     */
    public function __construct(
        ?string $state = null,
        ?string $balanceAmount = null,
        ?string $currencyCode = null,
        ?array $paymentMethods = null,
        ?Subscription $subscription = null,
    ) {
        $this->state = $state ?? '';
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
