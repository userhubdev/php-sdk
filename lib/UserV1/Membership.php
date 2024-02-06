<?php

// Code generated. DO NOT EDIT.

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
    public null|\UserHub\UserV1\Organization $organization;

    /**
     * The user's role within the organization.
     */
    public null|\UserHub\UserV1\Role $role;

    /**
     * The subscription associated with the organization.
     */
    public null|\UserHub\UserV1\AccountSubscription $subscription;

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
            'organization' => isset($this->organization) ? $this->organization : null,
            'role' => isset($this->role) ? $this->role : null,
            'subscription' => isset($this->subscription) ? $this->subscription : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Membership(
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'role'}) ? Role::jsonUnserialize($data->{'role'}) : null,
            isset($data->{'subscription'}) ? AccountSubscription::jsonUnserialize($data->{'subscription'}) : null,
        );
    }
}
