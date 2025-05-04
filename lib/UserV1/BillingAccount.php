<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\CommonV1\Address;
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
     * The human-readable display name of the billing account.
     */
    public ?string $displayName;

    /**
     * The email address of the billing account.
     */
    public ?string $email;

    /**
     * The E164 phone number for the billing account (e.g. `+12125550123`).
     */
    public ?string $phoneNumber;

    /**
     * The billing address for the billing account.
     */
    public ?Address $address;

    /**
     * The ISO-4217 currency code for the billing account (e.g. `USD`).
     */
    public ?string $currencyCode;

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
     * The available checkouts.
     *
     * @var BillingAccountCheckout[]
     */
    public array $checkouts;

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
     * @param null|BillingAccountCheckout[] $checkouts
     * @param null|PaymentMethod[]          $paymentMethods
     */
    public function __construct(
        ?string $state = null,
        ?string $displayName = null,
        ?string $email = null,
        ?string $phoneNumber = null,
        ?Address $address = null,
        ?string $currencyCode = null,
        ?string $balanceAmount = null,
        ?array $checkouts = null,
        ?array $paymentMethods = null,
        ?Subscription $subscription = null,
    ) {
        $this->state = $state ?? '';
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->address = $address ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->balanceAmount = $balanceAmount ?? null;
        $this->checkouts = $checkouts ?? [];
        $this->paymentMethods = $paymentMethods ?? [];
        $this->subscription = $subscription ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'state' => $this->state,
            'displayName' => $this->displayName,
            'email' => $this->email,
            'phoneNumber' => $this->phoneNumber,
            'address' => $this->address,
            'currencyCode' => $this->currencyCode,
            'balanceAmount' => $this->balanceAmount,
            'checkouts' => $this->checkouts,
            'paymentMethods' => $this->paymentMethods,
            'subscription' => $this->subscription,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'state'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'phoneNumber'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            $data->{'currencyCode'} ?? null,
            $data->{'balanceAmount'} ?? null,
            isset($data->{'checkouts'}) ? Util::mapArray($data->{'checkouts'}, [BillingAccountCheckout::class, 'jsonUnserialize']) : null,
            isset($data->{'paymentMethods'}) ? Util::mapArray($data->{'paymentMethods'}, [PaymentMethod::class, 'jsonUnserialize']) : null,
            isset($data->{'subscription'}) ? Subscription::jsonUnserialize($data->{'subscription'}) : null,
        );
    }
}
