<?php

// Code generated. DO NOT EDIT.

namespace UserHub\EventsV1;

use UserHub\AdminV1\Organization;
use UserHub\Internal\JsonUnserializable;

/**
 * The organizations changed event.
 */
class OrganizationsChanged implements \JsonSerializable, JsonUnserializable
{
    /**
     * The organization.
     */
    public null|\UserHub\AdminV1\Organization $organization;

    public function __construct(
        null|Organization $organization = null,
    ) {
        $this->organization = $organization ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organization' => isset($this->organization) ? $this->organization : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new OrganizationsChanged(
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
        );
    }
}
