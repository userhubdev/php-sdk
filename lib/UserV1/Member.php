<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A member of an organization.
 */
class Member implements \JsonSerializable, JsonUnserializable
{
    /**
     * The user.
     */
    public null|\UserHub\UserV1\User $user;

    /**
     * The user's role within the organization.
     */
    public null|\UserHub\UserV1\Role $role;

    /**
     * The seat assigned to the member.
     *
     * This will be absent if there is no active
     * subscription for the organization or the user
     * has not been assigned a seat.
     */
    public null|\UserHub\UserV1\AccountSubscriptionSeat $seat;

    public function __construct(
        null|User $user = null,
        null|Role $role = null,
        null|AccountSubscriptionSeat $seat = null,
    ) {
        $this->user = $user ?? null;
        $this->role = $role ?? null;
        $this->seat = $seat ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'user' => isset($this->user) ? $this->user : null,
            'role' => isset($this->role) ? $this->role : null,
            'seat' => isset($this->seat) ? $this->seat : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Member(
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'role'}) ? Role::jsonUnserialize($data->{'role'}) : null,
            isset($data->{'seat'}) ? AccountSubscriptionSeat::jsonUnserialize($data->{'seat'}) : null,
        );
    }
}
