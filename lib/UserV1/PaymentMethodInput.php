<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;

/**
 * Payment method input parameters.
 */
final class PaymentMethodInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The full name of the owner of the payment method (e.g. `Jane Doe`).
     */
    public ?string $fullName;

    /**
     * The address for the payment method.
     */
    public ?Address $address;

    /**
     * The card expiration year (e.g. `2030`).
     */
    public ?int $expYear;

    /**
     * The card expiration month (e.g. `12`).
     */
    public ?int $expMonth;

    public function __construct(
        ?string $fullName = null,
        ?Address $address = null,
        ?int $expYear = null,
        ?int $expMonth = null,
    ) {
        $this->fullName = $fullName ?? null;
        $this->address = $address ?? null;
        $this->expYear = $expYear ?? null;
        $this->expMonth = $expMonth ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'fullName' => $this->fullName,
            'address' => $this->address,
            'expYear' => $this->expYear,
            'expMonth' => $this->expMonth,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'fullName'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            $data->{'expYear'} ?? null,
            $data->{'expMonth'} ?? null,
        );
    }
}
