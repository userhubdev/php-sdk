<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A postal address (billing, mailing, etc...).
 */
final class Address implements \JsonSerializable, JsonUnserializable
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
    public ?string $city;

    /**
     * The state, country, province, or region.
     */
    public ?string $state;

    /**
     * The ZIP or postal code.
     */
    public ?string $postalCode;

    /**
     * The 2-letter country code.
     */
    public ?string $country;

    /**
     * @param null|string[] $lines
     */
    public function __construct(
        ?array $lines = null,
        ?string $city = null,
        ?string $state = null,
        ?string $postalCode = null,
        ?string $country = null,
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
            'lines' => $this->lines,
            'city' => $this->city,
            'state' => $this->state,
            'postalCode' => $this->postalCode,
            'country' => $this->country,
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
