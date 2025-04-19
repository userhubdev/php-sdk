<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Organization input parameters.
 */
final class OrganizationInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the organization.
     */
    public string $id;

    /**
     * The client defined unique identifier of the organization account.
     *
     * It is restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * ID's starting with `org_` are reserved.
     */
    public ?string $uniqueId;

    /**
     * The human-readable display name of the organization.
     *
     * The maximum length is 200 characters.
     */
    public ?string $displayName;

    /**
     * The email address of the organization.
     *
     * The maximum length is 320 characters.
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
     *
     * The maximum length is 2000 characters.
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
     * The sign-up time for the organization.
     */
    public ?\DateTimeInterface $signupTime;

    /**
     * Whether the organization is disabled.
     */
    public ?bool $disabled;

    public function __construct(
        ?string $id = null,
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
        ?\DateTimeInterface $signupTime = null,
        ?bool $disabled = null,
    ) {
        $this->id = $id ?? '';
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
        $this->signupTime = $signupTime ?? null;
        $this->disabled = $disabled ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
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
            'signupTime' => Util::encodeDateTime($this->signupTime),
            'disabled' => $this->disabled,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
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
            isset($data->{'signupTime'}) ? Util::decodeDateTime($data->{'signupTime'}) : null,
            $data->{'disabled'} ?? null,
        );
    }
}
