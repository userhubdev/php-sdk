<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;

/**
 * An email address.
 */
final class Email implements \JsonSerializable, JsonUnserializable
{
    /**
     * The email address (e.g. `jane@example.com`).
     */
    public string $address;

    /**
     * The email name (e.g. `Jane Doe`).
     */
    public ?string $displayName;

    public function __construct(
        ?string $address = null,
        ?string $displayName = null,
    ) {
        $this->address = $address ?? '';
        $this->displayName = $displayName ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'address' => $this->address,
            'displayName' => $this->displayName,
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
