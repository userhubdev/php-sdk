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
    public ?string $stateReason;

    /**
     * The flow type.
     */
    public string $type;

    /**
     * The target organization for the flow.
     */
    public ?Organization $organization;

    /**
     * The target user for the flow.
     */
    public ?User $user;

    /**
     * The user who created the flow.
     *
     * This will not be set if the invitation was created by an admin.
     */
    public ?User $creator;

    /**
     * The start time of the flow.
     */
    public \DateTimeInterface $startTime;

    /**
     * The time the flow will expire.
     */
    public ?\DateTimeInterface $expireTime;

    /**
     * The expire duration of the flow.
     */
    public ?string $ttl;

    /**
     * The flow secret.
     *
     * This is only populated on create.
     */
    public ?string $secret;

    /**
     * The join organization flow type specific data.
     */
    public ?JoinOrganizationFlow $joinOrganization;

    /**
     * The signup flow type specific data.
     */
    public ?SignupFlow $signup;

    /**
     * The flow view.
     */
    public string $view;

    /**
     * The creation time of the flow.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the flow.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        ?string $id = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?string $type = null,
        ?Organization $organization = null,
        ?User $user = null,
        ?User $creator = null,
        ?\DateTimeInterface $startTime = null,
        ?\DateTimeInterface $expireTime = null,
        ?string $ttl = null,
        ?string $secret = null,
        ?JoinOrganizationFlow $joinOrganization = null,
        ?SignupFlow $signup = null,
        ?string $view = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
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
        $this->joinOrganization = $joinOrganization ?? null;
        $this->signup = $signup ?? null;
        $this->view = $view ?? '';
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'type' => $this->type,
            'organization' => $this->organization,
            'user' => $this->user,
            'creator' => $this->creator,
            'startTime' => Util::encodeDateTime($this->startTime),
            'expireTime' => Util::encodeDateTime($this->expireTime),
            'ttl' => $this->ttl,
            'secret' => $this->secret,
            'joinOrganization' => $this->joinOrganization,
            'signup' => $this->signup,
            'view' => $this->view,
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
            isset($data->{'joinOrganization'}) ? JoinOrganizationFlow::jsonUnserialize($data->{'joinOrganization'}) : null,
            isset($data->{'signup'}) ? SignupFlow::jsonUnserialize($data->{'signup'}) : null,
            $data->{'view'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
