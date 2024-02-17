<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * User input parameters.
 */
class UserInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the user.
     */
    public null|string $id;

    /**
     * The client defined unique identifier of the user account.
     *
     * It is restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * ID's starting with `usr_` are reserved.
     */
    public null|string $uniqueId;

    /**
     * The human-readable display name of the user.
     *
     * The maximum length is 200 characters.
     */
    public null|string $displayName;

    /**
     * The email address of the user.
     *
     * The maximum length is 320 characters.
     */
    public null|string $email;

    /**
     * Whether the user's email address has been verified.
     */
    public null|bool $emailVerified;

    /**
     * The E164 phone number for the user (e.g. `+12125550123`).
     */
    public null|string $phoneNumber;

    /**
     * Whether the user's phone number has been verified.
     */
    public null|bool $phoneNumberVerified;

    /**
     * The photo/avatar URL of the user.
     *
     * The maximum length is 2000 characters.
     */
    public null|string $imageUrl;

    /**
     * The default ISO-4217 currency code for the user (e.g. `USD`).
     */
    public null|string $currencyCode;

    /**
     * The IETF BCP-47 language code for the user (e.g. `en`).
     */
    public null|string $languageCode;

    /**
     * The country/region code for the user (e.g. `US`).
     */
    public null|string $regionCode;

    /**
     * The IANA time zone for the user (e.g. `America/New_York`).
     */
    public null|string $timeZone;

    /**
     * The billing address for the user.
     */
    public null|Address $address;

    /**
     * The sign-up time for the user.
     */
    public null|\DateTimeInterface $signupTime;

    /**
     * Whether the user is disabled.
     */
    public null|bool $disabled;

    public function __construct(
        null|string $id = null,
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
        null|\DateTimeInterface $signupTime = null,
        null|bool $disabled = null,
    ) {
        $this->id = $id ?? null;
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
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'displayName' => $this->displayName ?? null,
            'email' => $this->email ?? null,
            'emailVerified' => $this->emailVerified ?? null,
            'phoneNumber' => $this->phoneNumber ?? null,
            'phoneNumberVerified' => $this->phoneNumberVerified ?? null,
            'imageUrl' => $this->imageUrl ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'languageCode' => $this->languageCode ?? null,
            'regionCode' => $this->regionCode ?? null,
            'timeZone' => $this->timeZone ?? null,
            'address' => $this->address ?? null,
            'signupTime' => isset($this->signupTime) ? Util::encodeDateTime($this->signupTime) : null,
            'disabled' => $this->disabled ?? null,
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
