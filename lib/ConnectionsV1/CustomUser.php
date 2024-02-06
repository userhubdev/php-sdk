<?php

// Code generated. DO NOT EDIT.

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The user object for the Custom Users connection.
 */
class CustomUser implements \JsonSerializable, JsonUnserializable
{
    /**
     * The external identifier for the user.
     */
    public string $id;

    /**
     * The human-readable display name of the user.
     *
     * The maximum length is 200 characters.
     */
    public null|string $displayName;

    /**
     * The email address of the user.
     *
     * The maximum length is 320 characters.
     */
    public null|string $email;

    /**
     * Whether the user's email address has been verified.
     */
    public null|bool $emailVerified;

    /**
     * The E164 phone number for the user (e.g. `+12125550123`).
     */
    public null|string $phoneNumber;

    /**
     * Whether the user's phone number has been verified.
     */
    public null|bool $phoneNumberVerified;

    /**
     * The photo/avatar URL of the user.
     *
     * The maximum length is 2000 characters.
     */
    public null|string $imageUrl;

    /**
     * Whether the user is disabled.
     */
    public null|bool $disabled;

    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|string $email = null,
        null|bool $emailVerified = null,
        null|string $phoneNumber = null,
        null|bool $phoneNumberVerified = null,
        null|string $imageUrl = null,
        null|bool $disabled = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->emailVerified = $emailVerified ?? null;
        $this->phoneNumber = $phoneNumber ?? null;
        $this->phoneNumberVerified = $phoneNumberVerified ?? null;
        $this->imageUrl = $imageUrl ?? null;
        $this->disabled = $disabled ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'email' => isset($this->email) ? $this->email : null,
            'emailVerified' => isset($this->emailVerified) ? $this->emailVerified : null,
            'phoneNumber' => isset($this->phoneNumber) ? $this->phoneNumber : null,
            'phoneNumberVerified' => isset($this->phoneNumberVerified) ? $this->phoneNumberVerified : null,
            'imageUrl' => isset($this->imageUrl) ? $this->imageUrl : null,
            'disabled' => isset($this->disabled) ? $this->disabled : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new CustomUser(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
            isset($data->{'emailVerified'}) ? $data->{'emailVerified'} : null,
            isset($data->{'phoneNumber'}) ? $data->{'phoneNumber'} : null,
            isset($data->{'phoneNumberVerified'}) ? $data->{'phoneNumberVerified'} : null,
            isset($data->{'imageUrl'}) ? $data->{'imageUrl'} : null,
            isset($data->{'disabled'}) ? $data->{'disabled'} : null,
        );
    }
}
