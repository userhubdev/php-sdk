<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A group account.
 */
final class Organization implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the organization.
     */
    public string $id;

    /**
     * The client defined unique identifier of the organization account.
     */
    public ?string $uniqueId;

    /**
     * The human-readable display name of the organization.
     */
    public ?string $displayName;

    /**
     * The email address of the organization.
     */
    public ?string $email;

    /**
     * Whether the organization's email address has been verified.
     */
    public ?bool $emailVerified;

    /**
     * The photo/avatar URL of the organization.
     */
    public ?string $imageUrl;

    /**
     * The number of members in the organization.
     *
     * This includes disabled users, but does not include user's marked for deletion.
     */
    public int $memberCount;

    /**
     * Whether the organization is disabled.
     */
    public ?bool $disabled;

    public function __construct(
        ?string $id = null,
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $email = null,
        ?bool $emailVerified = null,
        ?string $imageUrl = null,
        ?int $memberCount = null,
        ?bool $disabled = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->emailVerified = $emailVerified ?? null;
        $this->imageUrl = $imageUrl ?? null;
        $this->memberCount = $memberCount ?? 0;
        $this->disabled = $disabled ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'displayName' => $this->displayName ?? null,
            'email' => $this->email ?? null,
            'emailVerified' => $this->emailVerified ?? null,
            'imageUrl' => $this->imageUrl ?? null,
            'memberCount' => $this->memberCount ?? null,
            'disabled' => $this->disabled ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'uniqueId'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'emailVerified'} ?? null,
            $data->{'imageUrl'} ?? null,
            $data->{'memberCount'} ?? null,
            $data->{'disabled'} ?? null,
        );
    }
}
