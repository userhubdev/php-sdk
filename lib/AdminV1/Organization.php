<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A group account.
 */
final class Organization implements \JsonSerializable, JsonUnserializable
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
    public ?string $stateReason;

    /**
     * The client defined unique identifier of the organization account.
     */
    public ?string $uniqueId;

    /**
     * The human-readable display name of the organization.
     */
    public ?string $displayName;

    /**
     * The email address of the organization.
     */
    public ?string $email;

    /**
     * Whether the organization's email address has been verified.
     */
    public ?bool $emailVerified;

    /**
     * The E164 phone number for the organization (e.g. `+12125550123`).
     */
    public ?string $phoneNumber;

    /**
     * Whether the organization's phone number has been verified.
     */
    public ?bool $phoneNumberVerified;

    /**
     * The photo/avatar URL of the organization.
     */
    public ?string $imageUrl;

    /**
     * The default ISO-4217 currency code for the organization (e.g. `USD`).
     */
    public ?string $currencyCode;

    /**
     * The IETF BCP-47 language code for the organization (e.g. `en`).
     */
    public ?string $languageCode;

    /**
     * The country/region code for the organization (e.g. `US`).
     */
    public ?string $regionCode;

    /**
     * The IANA time zone for the organization (e.g. `America/New_York`).
     */
    public ?string $timeZone;

    /**
     * The default address for the organization.
     */
    public ?Address $address;

    /**
     * The connected accounts.
     *
     * @var AccountConnection[]
     */
    public array $accountConnections;

    /**
     * The organization's default active subscription.
     */
    public ?AccountSubscription $subscription;

    /**
     * The sign-up time for the organization.
     */
    public ?\DateTimeInterface $signupTime;

    /**
     * The number of members in the organization.
     *
     * This includes disabled users, but does not include user's marked for deletion.
     */
    public int $memberCount;

    /**
     * Whether the organization is disabled.
     */
    public ?bool $disabled;

    /**
     * The organization view.
     */
    public string $view;

    /**
     * The creation time of the organization.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the organization.
     */
    public \DateTimeInterface $updateTime;

    /**
     * @param null|AccountConnection[] $accountConnections
     */
    public function __construct(
        ?string $id = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $email = null,
        ?bool $emailVerified = null,
        ?string $phoneNumber = null,
        ?bool $phoneNumberVerified = null,
        ?string $imageUrl = null,
        ?string $currencyCode = null,
        ?string $languageCode = null,
        ?string $regionCode = null,
        ?string $timeZone = null,
        ?Address $address = null,
        ?array $accountConnections = null,
        ?AccountSubscription $subscription = null,
        ?\DateTimeInterface $signupTime = null,
        ?int $memberCount = null,
        ?bool $disabled = null,
        ?string $view = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
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
        $this->memberCount = $memberCount ?? 0;
        $this->disabled = $disabled ?? null;
        $this->view = $view ?? '';
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'uniqueId' => $this->uniqueId,
            'displayName' => $this->displayName,
            'email' => $this->email,
            'emailVerified' => $this->emailVerified,
            'phoneNumber' => $this->phoneNumber,
            'phoneNumberVerified' => $this->phoneNumberVerified,
            'imageUrl' => $this->imageUrl,
            'currencyCode' => $this->currencyCode,
            'languageCode' => $this->languageCode,
            'regionCode' => $this->regionCode,
            'timeZone' => $this->timeZone,
            'address' => $this->address,
            'accountConnections' => $this->accountConnections,
            'subscription' => $this->subscription,
            'signupTime' => Util::encodeDateTime($this->signupTime),
            'memberCount' => $this->memberCount,
            'disabled' => $this->disabled,
            'view' => $this->view,
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
            $data->{'id'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            $data->{'uniqueId'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'emailVerified'} ?? null,
            $data->{'phoneNumber'} ?? null,
            $data->{'phoneNumberVerified'} ?? null,
            $data->{'imageUrl'} ?? null,
            $data->{'currencyCode'} ?? null,
            $data->{'languageCode'} ?? null,
            $data->{'regionCode'} ?? null,
            $data->{'timeZone'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            isset($data->{'accountConnections'}) ? Util::mapArray($data->{'accountConnections'}, [AccountConnection::class, 'jsonUnserialize']) : null,
            isset($data->{'subscription'}) ? AccountSubscription::jsonUnserialize($data->{'subscription'}) : null,
            isset($data->{'signupTime'}) ? Util::decodeDateTime($data->{'signupTime'}) : null,
            $data->{'memberCount'} ?? null,
            $data->{'disabled'} ?? null,
            $data->{'view'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
