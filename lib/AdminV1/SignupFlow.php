<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

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

    /**
     * Whether to create an organization as part of the signup flow.
     */
    public null|bool $createOrganization;

    public function __construct(
        null|string $email = null,
        null|string $displayName = null,
        null|bool $createOrganization = null,
    ) {
        $this->email = $email ?? null;
        $this->displayName = $displayName ?? null;
        $this->createOrganization = $createOrganization ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'email' => isset($this->email) ? $this->email : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'createOrganization' => isset($this->createOrganization) ? $this->createOrganization : null,
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
            isset($data->{'createOrganization'}) ? $data->{'createOrganization'} : null,
        );
    }
}
