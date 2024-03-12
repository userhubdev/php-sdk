<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The join organization flow.
 */
final class JoinOrganizationFlow implements \JsonSerializable, JsonUnserializable
{
    /**
     * The display name of the invitee.
     */
    public null|string $displayName;

    /**
     * The email address of the invitee.
     *
     * This is required if a user isn't provided
     * or the user's email address is empty.
     */
    public null|string $email;

    /**
     * The role to be assigned to the invitee.
     */
    public null|Role $role;

    public function __construct(
        null|string $displayName = null,
        null|string $email = null,
        null|Role $role = null,
    ) {
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->role = $role ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'displayName' => $this->displayName ?? null,
            'email' => $this->email ?? null,
            'role' => $this->role ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            isset($data->{'role'}) ? Role::jsonUnserialize($data->{'role'}) : null,
        );
    }
}
