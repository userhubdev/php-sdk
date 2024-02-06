<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

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
    public null|\UserHub\AdminV1\Organization $organization;

    /**
     * The target user for the flow.
     */
    public null|\UserHub\AdminV1\User $user;

    /**
     * The user who created the flow.
     *
     * This will not be set if the invitation was created by an admin.
     */
    public null|\UserHub\AdminV1\User $creator;

    /**
     * The time the flow will expire.
     */
    public null|\DateTimeInterface $expireTime;

    /**
     * The expire duration of the flow.
     */
    public null|string $ttl;

    /**
     * The flow secret.
     *
     * This is only populated on create.
     */
    public null|string $secret;

    /**
     * The creation time of the flow.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the flow.
     */
    public \DateTimeInterface $updateTime;

    /**
     * The join organization flow type specific data.
     */
    public null|\UserHub\AdminV1\JoinOrganizationFlow $joinOrganization;

    /**
     * The signup flow type specific data.
     */
    public null|\UserHub\AdminV1\SignupFlow $signup;

    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $type = null,
        null|Organization $organization = null,
        null|User $user = null,
        null|User $creator = null,
        null|\DateTimeInterface $expireTime = null,
        null|string $ttl = null,
        null|string $secret = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
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
        $this->expireTime = $expireTime ?? null;
        $this->ttl = $ttl ?? null;
        $this->secret = $secret ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
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
            'ttl' => isset($this->ttl) ? $this->ttl : null,
            'secret' => isset($this->secret) ? $this->secret : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
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
            isset($data->{'ttl'}) ? $data->{'ttl'} : null,
            isset($data->{'secret'}) ? $data->{'secret'} : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'joinOrganization'}) ? JoinOrganizationFlow::jsonUnserialize($data->{'joinOrganization'}) : null,
            isset($data->{'signup'}) ? SignupFlow::jsonUnserialize($data->{'signup'}) : null,
        );
    }
}
