<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A postal address (billing, mailing, etc...).
 */
class Address implements \JsonSerializable, JsonUnserializable
{
    /**
     * The address lines.
     *
     * @var string[]
     */
    public array $lines;

    /**
     * The city, district, suburb, town, or village.
     */
    public null|string $city;

    /**
     * The state, country, province, or region.
     */
    public null|string $state;

    /**
     * The ZIP or postal code.
     */
    public null|string $postalCode;

    /**
     * The 2-letter country code.
     */
    public null|string $country;

    public function __construct(
        null|array $lines = null,
        null|string $city = null,
        null|string $state = null,
        null|string $postalCode = null,
        null|string $country = null,
    ) {
        $this->lines = $lines ?? [];
        $this->city = $city ?? null;
        $this->state = $state ?? null;
        $this->postalCode = $postalCode ?? null;
        $this->country = $country ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'lines' => $this->lines ?? null,
            'city' => $this->city ?? null,
            'state' => $this->state ?? null,
            'postalCode' => $this->postalCode ?? null,
            'country' => $this->country ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'lines'} ?? null,
            $data->{'city'} ?? null,
            $data->{'state'} ?? null,
            $data->{'postalCode'} ?? null,
            $data->{'country'} ?? null,
        );
    }
}
