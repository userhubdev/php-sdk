<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A user's membership in an organization.
 *
 * This is the user view, see Member for the organizational
 * view.
 */
class Membership implements \JsonSerializable, JsonUnserializable
{
    /**
     * The organization.
     */
    public null|Organization $organization;

    /**
     * The user's role within the organization.
     */
    public null|Role $role;

    /**
     * The subscription associated with the organization.
     */
    public null|AccountSubscription $subscription;

    public function __construct(
        null|Organization $organization = null,
        null|Role $role = null,
        null|AccountSubscription $subscription = null,
    ) {
        $this->organization = $organization ?? null;
        $this->role = $role ?? null;
        $this->subscription = $subscription ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organization' => $this->organization ?? null,
            'role' => $this->role ?? null,
            'subscription' => $this->subscription ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'role'}) ? Role::jsonUnserialize($data->{'role'}) : null,
            isset($data->{'subscription'}) ? AccountSubscription::jsonUnserialize($data->{'subscription'}) : null,
        );
    }
}
