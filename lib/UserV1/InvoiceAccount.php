<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;

/**
 * THe contact information for the invoice.
 */
class InvoiceAccount implements \JsonSerializable, JsonUnserializable
{
    /**
     * The company or individual's full name.
     */
    public null|string $fullName;

    /**
     * The billing email address.
     */
    public null|string $email;

    /**
     * The billing phone number.
     */
    public null|string $phoneNumber;

    /**
     * The billing address.
     */
    public null|\UserHub\CommonV1\Address $address;

    public function __construct(
        null|string $fullName = null,
        null|string $email = null,
        null|string $phoneNumber = null,
        null|Address $address = null,
    ) {
        $this->fullName = $fullName ?? null;
        $this->email = $email ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->address = $address ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'fullName' => isset($this->fullName) ? $this->fullName : null,
            'email' => isset($this->email) ? $this->email : null,
            'phoneNumber' => isset($this->phoneNumber) ? $this->phoneNumber : null,
            'address' => isset($this->address) ? $this->address : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new InvoiceAccount(
            isset($data->{'fullName'}) ? $data->{'fullName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
            isset($data->{'phoneNumber'}) ? $data->{'phoneNumber'} : null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
        );
    }
}
