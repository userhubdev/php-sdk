<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A member of an organization.
 */
class Member implements \JsonSerializable, JsonUnserializable
{
    /**
     * Whether the membership is active.
     */
    public string $state;

    /**
     * The user.
     */
    public null|User $user;

    /**
     * The user's role within the organization.
     */
    public null|Role $role;

    /**
     * The seat associated with the member.
     *
     * This will be absent if there is no active
     * subscription for the organization or the user
     * has not been assigned a seat.
     */
    public null|AccountSubscriptionSeat $seat;

    /**
     * The creation time of the membership.
     */
    public null|\DateTimeInterface $createTime;

    /**
     * The last update time of the membership.
     */
    public null|\DateTimeInterface $updateTime;

    public function __construct(
        null|string $state = null,
        null|User $user = null,
        null|Role $role = null,
        null|AccountSubscriptionSeat $seat = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->state = $state ?? '';
        $this->user = $user ?? null;
        $this->role = $role ?? null;
        $this->seat = $seat ?? null;
        $this->createTime = $createTime ?? null;
        $this->updateTime = $updateTime ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'state' => $this->state ?? null,
            'user' => $this->user ?? null,
            'role' => $this->role ?? null,
            'seat' => $this->seat ?? null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
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
