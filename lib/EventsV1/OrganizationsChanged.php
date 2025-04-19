<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\AdminV1\Organization;
use UserHub\Internal\JsonUnserializable;

/**
 * The organizations changed event.
 */
final class OrganizationsChanged implements \JsonSerializable, JsonUnserializable
{
    /**
     * The organization.
     */
    public ?Organization $organization;

    public function __construct(
        ?Organization $organization = null,
    ) {
        $this->organization = $organization ?? new Organization();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organization' => $this->organization,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
        );
    }
}
