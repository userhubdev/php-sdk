<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;

/**
 * An email address.
 */
class Email implements \JsonSerializable, JsonUnserializable
{
    /**
     * The email address (e.g. `jane@example.com`).
     */
    public null|string $address;

    /**
     * The email name (e.g. `Jane Doe`).
     */
    public null|string $displayName;

    public function __construct(
        null|string $address = null,
        null|string $displayName = null,
    ) {
        $this->address = $address ?? null;
        $this->displayName = $displayName ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'address' => $this->address ?? null,
            'displayName' => $this->displayName ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'address'} ?? null,
            $data->{'displayName'} ?? null,
        );
    }
}
