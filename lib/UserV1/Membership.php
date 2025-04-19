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
final class Membership implements \JsonSerializable, JsonUnserializable
{
    /**
     * The organization.
     */
    public ?Organization $organization;

    /**
     * The user's role within the organization.
     */
    public ?Role $role;

    /**
     * The subscription associated with the organization.
     */
    public ?AccountSubscription $subscription;

    public function __construct(
        ?Organization $organization = null,
        ?Role $role = null,
        ?AccountSubscription $subscription = null,
    ) {
        $this->organization = $organization ?? new Organization();
        $this->role = $role ?? new Role();
        $this->subscription = $subscription ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organization' => $this->organization,
            'role' => $this->role,
            'subscription' => $this->subscription,
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
