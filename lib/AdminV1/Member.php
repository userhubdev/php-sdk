<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A member of an organization.
 */
final class Member implements \JsonSerializable, JsonUnserializable
{
    /**
     * Whether the membership is active.
     */
    public string $state;

    /**
     * The user.
     */
    public ?User $user;

    /**
     * The user's role within the organization.
     */
    public ?Role $role;

    /**
     * The seat associated with the member.
     *
     * This will be absent if there is no active
     * subscription for the organization or the user
     * has not been assigned a seat.
     */
    public ?AccountSubscriptionSeat $seat;

    /**
     * The creation time of the membership.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the membership.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        ?string $state = null,
        ?User $user = null,
        ?Role $role = null,
        ?AccountSubscriptionSeat $seat = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
    ) {
        $this->state = $state ?? '';
        $this->user = $user ?? new User();
        $this->role = $role ?? new Role();
        $this->seat = $seat ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'state' => $this->state,
            'user' => $this->user,
            'role' => $this->role,
            'seat' => $this->seat,
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'state'} ?? null,
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'role'}) ? Role::jsonUnserialize($data->{'role'}) : null,
            isset($data->{'seat'}) ? AccountSubscriptionSeat::jsonUnserialize($data->{'seat'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
