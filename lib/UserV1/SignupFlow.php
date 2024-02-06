<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The signup flow.
 */
class SignupFlow implements \JsonSerializable, JsonUnserializable
{
    /**
     * The email address of the invitee.
     */
    public null|string $email;

    /**
     * The display name of the invitee.
     */
    public null|string $displayName;

    public function __construct(
        null|string $email = null,
        null|string $displayName = null,
    ) {
        $this->email = $email ?? null;
        $this->displayName = $displayName ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'email' => isset($this->email) ? $this->email : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new SignupFlow(
            isset($data->{'email'}) ? $data->{'email'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
        );
    }
}
