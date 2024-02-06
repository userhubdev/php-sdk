<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * An invitation, task, or user request (e.g. join organization).
 */
class Flow implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the flow.
     */
    public string $id;

    /**
     * The current state of the flow.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The flow type.
     */
    public string $type;

    /**
     * The target organization for the flow.
     */
    public null|\UserHub\UserV1\Organization $organization;

    /**
     * The target user for the flow.
     */
    public null|\UserHub\UserV1\User $user;

    /**
     * The user who created the flow.
     */
    public null|\UserHub\UserV1\User $creator;

    /**
     * The time the flow will expires.
     */
    public \DateTimeInterface $expireTime;

    /**
     * The creation time of the flow.
     */
    public \DateTimeInterface $createTime;

    /**
     * The join organization flow type specific data.
     */
    public null|\UserHub\UserV1\JoinOrganizationFlow $joinOrganization;

    /**
     * The signup flow type specific data.
     */
    public null|\UserHub\UserV1\SignupFlow $signup;

    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $type = null,
        null|Organization $organization = null,
        null|User $user = null,
        null|User $creator = null,
        null|\DateTimeInterface $expireTime = null,
        null|\DateTimeInterface $createTime = null,
        null|JoinOrganizationFlow $joinOrganization = null,
        null|SignupFlow $signup = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->type = $type ?? '';
        $this->organization = $organization ?? null;
        $this->user = $user ?? null;
        $this->creator = $creator ?? null;
        $this->expireTime = $expireTime ?? Util::emptyDateTime();
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->joinOrganization = $joinOrganization ?? null;
        $this->signup = $signup ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'state' => isset($this->state) ? $this->state : null,
            'stateReason' => isset($this->stateReason) ? $this->stateReason : null,
            'type' => isset($this->type) ? $this->type : null,
            'organization' => isset($this->organization) ? $this->organization : null,
            'user' => isset($this->user) ? $this->user : null,
            'creator' => isset($this->creator) ? $this->creator : null,
            'expireTime' => isset($this->expireTime) ? Util::encodeDateTime($this->expireTime) : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'joinOrganization' => isset($this->joinOrganization) ? $this->joinOrganization : null,
            'signup' => isset($this->signup) ? $this->signup : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Flow(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'stateReason'}) ? $data->{'stateReason'} : null,
            isset($data->{'type'}) ? $data->{'type'} : null,
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'creator'}) ? User::jsonUnserialize($data->{'creator'}) : null,
            isset($data->{'expireTime'}) ? Util::decodeDateTime($data->{'expireTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'joinOrganization'}) ? JoinOrganizationFlow::jsonUnserialize($data->{'joinOrganization'}) : null,
            isset($data->{'signup'}) ? SignupFlow::jsonUnserialize($data->{'signup'}) : null,
        );
    }
}
