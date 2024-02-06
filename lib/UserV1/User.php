<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Individual account.
 */
class User implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the user.
     */
    public string $id;

    /**
     * The client defined unique identifier of the user account.
     */
    public null|string $uniqueId;

    /**
     * The human-readable display name of the user.
     */
    public null|string $displayName;

    /**
     * The email address of the user.
     */
    public null|string $email;

    /**
     * Whether the user's email address has been verified.
     */
    public null|bool $emailVerified;

    /**
     * The photo/avatar URL of the user.
     */
    public null|string $imageUrl;

    /**
     * Whether the user is disabled.
     */
    public null|bool $disabled;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $email = null,
        null|bool $emailVerified = null,
        null|string $imageUrl = null,
        null|bool $disabled = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->emailVerified = $emailVerified ?? null;
        $this->imageUrl = $imageUrl ?? null;
        $this->disabled = $disabled ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'uniqueId' => isset($this->uniqueId) ? $this->uniqueId : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'email' => isset($this->email) ? $this->email : null,
            'emailVerified' => isset($this->emailVerified) ? $this->emailVerified : null,
            'imageUrl' => isset($this->imageUrl) ? $this->imageUrl : null,
            'disabled' => isset($this->disabled) ? $this->disabled : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new User(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'uniqueId'}) ? $data->{'uniqueId'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
            isset($data->{'emailVerified'}) ? $data->{'emailVerified'} : null,
            isset($data->{'imageUrl'}) ? $data->{'imageUrl'} : null,
            isset($data->{'disabled'}) ? $data->{'disabled'} : null,
        );
    }
}
