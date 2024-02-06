<?php

// Code generated. DO NOT EDIT.

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
            'lines' => isset($this->lines) ? $this->lines : null,
            'city' => isset($this->city) ? $this->city : null,
            'state' => isset($this->state) ? $this->state : null,
            'postalCode' => isset($this->postalCode) ? $this->postalCode : null,
            'country' => isset($this->country) ? $this->country : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Address(
            isset($data->{'lines'}) ? $data->{'lines'} : null,
            isset($data->{'city'}) ? $data->{'city'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'postalCode'}) ? $data->{'postalCode'} : null,
            isset($data->{'country'}) ? $data->{'country'} : null,
        );
    }
}
