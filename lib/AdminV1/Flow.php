<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * An invitation, task, or user request (e.g. join organization).
 */
final class Flow implements \JsonSerializable, JsonUnserializable
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
    public null|Organization $organization;

    /**
     * The target user for the flow.
     */
    public null|User $user;

    /**
     * The user who created the flow.
     *
     * This will not be set if the invitation was created by an admin.
     */
    public null|User $creator;

    /**
     * The start time of the flow.
     */
    public \DateTimeInterface $startTime;

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
    public null|JoinOrganizationFlow $joinOrganization;

    /**
     * The signup flow type specific data.
     */
    public null|SignupFlow $signup;

    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $type = null,
        null|Organization $organization = null,
        null|User $user = null,
        null|User $creator = null,
        null|\DateTimeInterface $startTime = null,
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
        $this->startTime = $startTime ?? Util::emptyDateTime();
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
            'id' => $this->id ?? null,
            'state' => $this->state ?? null,
            'stateReason' => $this->stateReason ?? null,
            'type' => $this->type ?? null,
            'organization' => $this->organization ?? null,
            'user' => $this->user ?? null,
            'creator' => $this->creator ?? null,
            'startTime' => isset($this->startTime) ? Util::encodeDateTime($this->startTime) : null,
            'expireTime' => isset($this->expireTime) ? Util::encodeDateTime($this->expireTime) : null,
            'ttl' => $this->ttl ?? null,
            'secret' => $this->secret ?? null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
            'joinOrganization' => $this->joinOrganization ?? null,
            'signup' => $this->signup ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            $data->{'type'} ?? null,
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'creator'}) ? User::jsonUnserialize($data->{'creator'}) : null,
            isset($data->{'startTime'}) ? Util::decodeDateTime($data->{'startTime'}) : null,
            isset($data->{'expireTime'}) ? Util::decodeDateTime($data->{'expireTime'}) : null,
            $data->{'ttl'} ?? null,
            $data->{'secret'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'joinOrganization'}) ? JoinOrganizationFlow::jsonUnserialize($data->{'joinOrganization'}) : null,
            isset($data->{'signup'}) ? SignupFlow::jsonUnserialize($data->{'signup'}) : null,
        );
    }
}
