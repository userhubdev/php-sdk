<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\AdminV1\Member;
use UserHub\AdminV1\Organization;
use UserHub\Internal\JsonUnserializable;

/**
 * The members changed event.
 */
class MembersChanged implements \JsonSerializable, JsonUnserializable
{
    /**
     * The organization.
     */
    public null|Organization $organization;

    /**
     * The member.
     */
    public null|Member $member;

    public function __construct(
        null|Organization $organization = null,
        null|Member $member = null,
    ) {
        $this->organization = $organization ?? new Organization();
        $this->member = $member ?? new Member();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organization' => $this->organization ?? null,
            'member' => $this->member ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'member'}) ? Member::jsonUnserialize($data->{'member'}) : null,
        );
    }
}
