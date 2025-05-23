<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A link between an organization/user and an external account.
 */
final class AccountConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The tenant connection.
     */
    public ?Connection $connection;

    /**
     * The external identifier of the connected account.
     */
    public string $externalId;

    /**
     * The external admin URL for the connected account.
     */
    public ?string $adminUrl;

    /**
     * The status of the connected account.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public ?string $stateReason;

    /**
     * The human-readable display name of the external account.
     */
    public ?string $displayName;

    /**
     * The email address of the external account.
     */
    public ?string $email;

    /**
     * Whether the external account's email address has been verified.
     */
    public ?bool $emailVerified;

    /**
     * The E164 phone number for the external account (e.g. `+12125550123`).
     */
    public ?string $phoneNumber;

    /**
     * Whether the external account's phone number has been verified.
     */
    public ?bool $phoneNumberVerified;

    /**
     * The billing address for the external account.
     */
    public ?Address $address;

    /**
     * The currency code for the account.
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
     * The payment methods for connections that support it.
     *
     * @var PaymentMethod[]
     */
    public array $paymentMethods;

    /**
     * The creation time of the account connection.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the account connection.
     */
    public \DateTimeInterface $updateTime;

    /**
     * @param null|PaymentMethod[] $paymentMethods
     */
    public function __construct(
        ?Connection $connection = null,
        ?string $externalId = null,
        ?string $adminUrl = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?string $displayName = null,
        ?string $email = null,
        ?bool $emailVerified = null,
        ?string $phoneNumber = null,
        ?bool $phoneNumberVerified = null,
        ?Address $address = null,
        ?string $currencyCode = null,
        ?string $balanceAmount = null,
        ?array $paymentMethods = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
    ) {
        $this->connection = $connection ?? null;
        $this->externalId = $externalId ?? '';
        $this->adminUrl = $adminUrl ?? null;
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->emailVerified = $emailVerified ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->phoneNumberVerified = $phoneNumberVerified ?? null;
        $this->address = $address ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->balanceAmount = $balanceAmount ?? null;
        $this->paymentMethods = $paymentMethods ?? [];
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'connection' => $this->connection,
            'externalId' => $this->externalId,
            'adminUrl' => $this->adminUrl,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'displayName' => $this->displayName,
            'email' => $this->email,
            'emailVerified' => $this->emailVerified,
            'phoneNumber' => $this->phoneNumber,
            'phoneNumberVerified' => $this->phoneNumberVerified,
            'address' => $this->address,
            'currencyCode' => $this->currencyCode,
            'balanceAmount' => $this->balanceAmount,
            'paymentMethods' => $this->paymentMethods,
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            $data->{'externalId'} ?? null,
            $data->{'adminUrl'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'emailVerified'} ?? null,
            $data->{'phoneNumber'} ?? null,
            $data->{'phoneNumberVerified'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            $data->{'currencyCode'} ?? null,
            $data->{'balanceAmount'} ?? null,
            isset($data->{'paymentMethods'}) ? Util::mapArray($data->{'paymentMethods'}, [PaymentMethod::class, 'jsonUnserialize']) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
