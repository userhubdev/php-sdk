<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The join organization flow.
 */
final class JoinOrganizationFlow implements \JsonSerializable, JsonUnserializable
{
    /**
     * The display name of the invitee.
     */
    public ?string $displayName;

    /**
     * The email address of the invitee.
     */
    public ?string $email;

    /**
     * The role to be assigned to the invitee.
     */
    public ?Role $role;

    public function __construct(
        ?string $displayName = null,
        ?string $email = null,
        ?Role $role = null,
    ) {
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->role = $role ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'displayName' => $this->displayName,
            'email' => $this->email,
            'role' => $this->role,
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
