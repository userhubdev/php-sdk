<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;

/**
 * BillingAccountInput input parameters.
 */
final class BillingAccountInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The human-readable display name of the billing account.
     *
     * The maximum length is 200 characters.
     *
     * This might be further restricted by the billing provider.
     */
    public ?string $displayName;

    /**
     * The email address of the billing account.
     *
     * The maximum length is 320 characters.
     *
     * This might be further restricted by the billing provider.
     */
    public ?string $email;

    /**
     * The E164 phone number of the billing account (e.g. `+12125550123`).
     */
    public ?string $phoneNumber;

    /**
     * The address for the billing account.
     */
    public ?Address $address;

    public function __construct(
        ?string $displayName = null,
        ?string $email = null,
        ?string $phoneNumber = null,
        ?Address $address = null,
    ) {
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->address = $address ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'displayName' => $this->displayName,
            'email' => $this->email,
            'phoneNumber' => $this->phoneNumber,
            'address' => $this->address,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'phoneNumber'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
        );
    }
}
