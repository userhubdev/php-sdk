<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;

/**
 * THe contact information for the invoice.
 */
final class InvoiceAccount implements \JsonSerializable, JsonUnserializable
{
    /**
     * The company or individual's full name.
     */
    public ?string $fullName;

    /**
     * The billing email address.
     */
    public ?string $email;

    /**
     * The billing phone number.
     */
    public ?string $phoneNumber;

    /**
     * The billing address.
     */
    public ?Address $address;

    public function __construct(
        ?string $fullName = null,
        ?string $email = null,
        ?string $phoneNumber = null,
        ?Address $address = null,
    ) {
        $this->fullName = $fullName ?? null;
        $this->email = $email ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->address = $address ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'fullName' => $this->fullName ?? null,
            'email' => $this->email ?? null,
            'phoneNumber' => $this->phoneNumber ?? null,
            'address' => $this->address ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'fullName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'phoneNumber'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
        );
    }
}
