<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

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
     */
    public ?User $creator;

    /**
     * The time the flow will expire.
     */
    public \DateTimeInterface $expireTime;

    /**
     * The creation time of the flow.
     */
    public \DateTimeInterface $createTime;

    /**
     * The join organization flow type specific data.
     */
    public ?JoinOrganizationFlow $joinOrganization;

    /**
     * The signup flow type specific data.
     */
    public ?SignupFlow $signup;

    public function __construct(
        ?string $id = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?string $type = null,
        ?Organization $organization = null,
        ?User $user = null,
        ?User $creator = null,
        ?\DateTimeInterface $expireTime = null,
        ?\DateTimeInterface $createTime = null,
        ?JoinOrganizationFlow $joinOrganization = null,
        ?SignupFlow $signup = null,
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
            'id' => $this->id ?? null,
            'state' => $this->state ?? null,
            'stateReason' => $this->stateReason ?? null,
            'type' => $this->type ?? null,
            'organization' => $this->organization ?? null,
            'user' => $this->user ?? null,
            'creator' => $this->creator ?? null,
            'expireTime' => isset($this->expireTime) ? Util::encodeDateTime($this->expireTime) : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
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
            isset($data->{'expireTime'}) ? Util::decodeDateTime($data->{'expireTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'joinOrganization'}) ? JoinOrganizationFlow::jsonUnserialize($data->{'joinOrganization'}) : null,
            isset($data->{'signup'}) ? SignupFlow::jsonUnserialize($data->{'signup'}) : null,
        );
    }
}
