<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

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
     * The seat associated with the membership.
     *
     * This will be absent if there is no active default
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
        ?Organization $organization = null,
        ?Role $role = null,
        ?AccountSubscriptionSeat $seat = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
    ) {
        $this->organization = $organization ?? new Organization();
        $this->role = $role ?? new Role();
        $this->seat = $seat ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organization' => $this->organization,
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
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'role'}) ? Role::jsonUnserialize($data->{'role'}) : null,
            isset($data->{'seat'}) ? AccountSubscriptionSeat::jsonUnserialize($data->{'seat'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
