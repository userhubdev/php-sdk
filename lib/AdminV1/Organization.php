<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A group account.
 */
class Organization implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the organization.
     */
    public string $id;

    /**
     * The current state of the organization.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The client defined unique identifier of the organization account.
     */
    public null|string $uniqueId;

    /**
     * The human-readable display name of the organization.
     */
    public null|string $displayName;

    /**
     * The email address of the organization.
     */
    public null|string $email;

    /**
     * Whether the organization's email address has been verified.
     */
    public null|bool $emailVerified;

    /**
     * The E164 phone number for the organization (e.g. `+12125550123`).
     */
    public null|string $phoneNumber;

    /**
     * Whether the organization's phone number has been verified.
     */
    public null|bool $phoneNumberVerified;

    /**
     * The photo/avatar URL of the organization.
     */
    public null|string $imageUrl;

    /**
     * The default ISO-4217 currency code for the organization (e.g. `USD`).
     */
    public null|string $currencyCode;

    /**
     * The IETF BCP-47 language code for the organization (e.g. `en`).
     */
    public null|string $languageCode;

    /**
     * The country/region code for the organization (e.g. `US`).
     */
    public null|string $regionCode;

    /**
     * The IANA time zone for the organization (e.g. `America/New_York`).
     */
    public null|string $timeZone;

    /**
     * The address for the organization.
     */
    public null|\UserHub\CommonV1\Address $address;

    /**
     * The connected accounts.
     *
     * @var \UserHub\AdminV1\AccountConnection[]
     */
    public array $accountConnections;

    /**
     * The organization's default active subscription.
     */
    public null|\UserHub\AdminV1\AccountSubscription $subscription;

    /**
     * The sign-up time for the organization.
     */
    public null|\DateTimeInterface $signupTime;

    /**
     * Whether the organization is disabled.
     */
    public null|bool $disabled;

    /**
     * The creation time of the organization.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the organization.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $email = null,
        null|bool $emailVerified = null,
        null|string $phoneNumber = null,
        null|bool $phoneNumberVerified = null,
        null|string $imageUrl = null,
        null|string $currencyCode = null,
        null|string $languageCode = null,
        null|string $regionCode = null,
        null|string $timeZone = null,
        null|Address $address = null,
        null|array $accountConnections = null,
        null|AccountSubscription $subscription = null,
        null|\DateTimeInterface $signupTime = null,
        null|bool $disabled = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->emailVerified = $emailVerified ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->phoneNumberVerified = $phoneNumberVerified ?? null;
        $this->imageUrl = $imageUrl ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->languageCode = $languageCode ?? null;
        $this->regionCode = $regionCode ?? null;
        $this->timeZone = $timeZone ?? null;
        $this->address = $address ?? null;
        $this->accountConnections = $accountConnections ?? [];
        $this->subscription = $subscription ?? null;
        $this->signupTime = $signupTime ?? null;
        $this->disabled = $disabled ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'state' => isset($this->state) ? $this->state : null,
            'stateReason' => isset($this->stateReason) ? $this->stateReason : null,
            'uniqueId' => isset($this->uniqueId) ? $this->uniqueId : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'email' => isset($this->email) ? $this->email : null,
            'emailVerified' => isset($this->emailVerified) ? $this->emailVerified : null,
            'phoneNumber' => isset($this->phoneNumber) ? $this->phoneNumber : null,
            'phoneNumberVerified' => isset($this->phoneNumberVerified) ? $this->phoneNumberVerified : null,
            'imageUrl' => isset($this->imageUrl) ? $this->imageUrl : null,
            'currencyCode' => isset($this->currencyCode) ? $this->currencyCode : null,
            'languageCode' => isset($this->languageCode) ? $this->languageCode : null,
            'regionCode' => isset($this->regionCode) ? $this->regionCode : null,
            'timeZone' => isset($this->timeZone) ? $this->timeZone : null,
            'address' => isset($this->address) ? $this->address : null,
            'accountConnections' => isset($this->accountConnections) ? $this->accountConnections : null,
            'subscription' => isset($this->subscription) ? $this->subscription : null,
            'signupTime' => isset($this->signupTime) ? Util::encodeDateTime($this->signupTime) : null,
            'disabled' => isset($this->disabled) ? $this->disabled : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Organization(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'stateReason'}) ? $data->{'stateReason'} : null,
            isset($data->{'uniqueId'}) ? $data->{'uniqueId'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
            isset($data->{'emailVerified'}) ? $data->{'emailVerified'} : null,
            isset($data->{'phoneNumber'}) ? $data->{'phoneNumber'} : null,
            isset($data->{'phoneNumberVerified'}) ? $data->{'phoneNumberVerified'} : null,
            isset($data->{'imageUrl'}) ? $data->{'imageUrl'} : null,
            isset($data->{'currencyCode'}) ? $data->{'currencyCode'} : null,
            isset($data->{'languageCode'}) ? $data->{'languageCode'} : null,
            isset($data->{'regionCode'}) ? $data->{'regionCode'} : null,
            isset($data->{'timeZone'}) ? $data->{'timeZone'} : null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            isset($data->{'accountConnections'}) ? Util::mapArray($data->{'accountConnections'}, [AccountConnection::class, 'jsonUnserialize']) : null,
            isset($data->{'subscription'}) ? AccountSubscription::jsonUnserialize($data->{'subscription'}) : null,
            isset($data->{'signupTime'}) ? Util::decodeDateTime($data->{'signupTime'}) : null,
            isset($data->{'disabled'}) ? $data->{'disabled'} : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
