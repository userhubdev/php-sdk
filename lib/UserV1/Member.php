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
    public ?User $user;

    /**
     * The user's role within the organization.
     */
    public ?Role $role;

    /**
     * The seat assigned to the member.
     *
     * This will be absent if there is no active
     * subscription for the organization or the user
     * has not been assigned a seat.
     */
    public ?AccountSubscriptionSeat $seat;

    public function __construct(
        ?User $user = null,
        ?Role $role = null,
        ?AccountSubscriptionSeat $seat = null,
    ) {
        $this->user = $user ?? new User();
        $this->role = $role ?? new Role();
        $this->seat = $seat ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'user' => $this->user,
            'role' => $this->role,
            'seat' => $this->seat,
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
