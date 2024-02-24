<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A member of an organization.
 */
final class Member implements \JsonSerializable, JsonUnserializable
{
    /**
     * The user.
     */
    public null|User $user;

    /**
     * The user's role within the organization.
     */
    public null|Role $role;

    /**
     * The seat assigned to the member.
     *
     * This will be absent if there is no active
     * subscription for the organization or the user
     * has not been assigned a seat.
     */
    public null|AccountSubscriptionSeat $seat;

    public function __construct(
        null|User $user = null,
        null|Role $role = null,
        null|AccountSubscriptionSeat $seat = null,
    ) {
        $this->user = $user ?? new User();
        $this->role = $role ?? new Role();
        $this->seat = $seat ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'user' => $this->user ?? null,
            'role' => $this->role ?? null,
            'seat' => $this->seat ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'role'}) ? Role::jsonUnserialize($data->{'role'}) : null,
            isset($data->{'seat'}) ? AccountSubscriptionSeat::jsonUnserialize($data->{'seat'}) : null,
        );
    }
}
