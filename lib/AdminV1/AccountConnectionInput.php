<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;

/**
 * AccountConnection input parameters.
 */
final class AccountConnectionInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier for the connection of the external account.
     */
    public string $connectionId;

    /**
     * The human-readable display name of the external account.
     *
     * The maximum length is 200 characters.
     *
     * This might be further restricted by the external provider.
     */
    public ?string $displayName;

    /**
     * The email address of the external account.
     *
     * The maximum length is 320 characters.
     *
     * This might be further restricted by the external provider.
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
     * The default ISO-4217 currency code for the external account (e.g. `USD`).
     */
    public ?string $currencyCode;

    /**
     * The billing address for the external account.
     */
    public ?Address $address;

    /**
     * Whether the external account is disabled.
     */
    public ?bool $disabled;

    public function __construct(
        ?string $connectionId = null,
        ?string $displayName = null,
        ?string $email = null,
        ?bool $emailVerified = null,
        ?string $phoneNumber = null,
        ?bool $phoneNumberVerified = null,
        ?string $currencyCode = null,
        ?Address $address = null,
        ?bool $disabled = null,
    ) {
        $this->connectionId = $connectionId ?? '';
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->emailVerified = $emailVerified ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->phoneNumberVerified = $phoneNumberVerified ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->address = $address ?? null;
        $this->disabled = $disabled ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'connectionId' => $this->connectionId ?? null,
            'displayName' => $this->displayName ?? null,
            'email' => $this->email ?? null,
            'emailVerified' => $this->emailVerified ?? null,
            'phoneNumber' => $this->phoneNumber ?? null,
            'phoneNumberVerified' => $this->phoneNumberVerified ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'address' => $this->address ?? null,
            'disabled' => $this->disabled ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'connectionId'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'emailVerified'} ?? null,
            $data->{'phoneNumber'} ?? null,
            $data->{'phoneNumberVerified'} ?? null,
            $data->{'currencyCode'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            $data->{'disabled'} ?? null,
        );
    }
}
