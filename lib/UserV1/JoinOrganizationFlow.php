<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The join organization flow.
 */
class JoinOrganizationFlow implements \JsonSerializable, JsonUnserializable
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

    public function __construct(
        null|string $displayName = null,
        null|string $email = null,
    ) {
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'email' => isset($this->email) ? $this->email : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new JoinOrganizationFlow(
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
        );
    }
}
