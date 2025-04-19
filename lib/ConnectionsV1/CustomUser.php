<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The user object for the Custom Users connection.
 */
final class CustomUser implements \JsonSerializable, JsonUnserializable
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
    public ?string $displayName;

    /**
     * The email address of the user.
     *
     * The maximum length is 320 characters.
     */
    public ?string $email;

    /**
     * Whether the user's email address has been verified.
     */
    public ?bool $emailVerified;

    /**
     * The E164 phone number for the user (e.g. `+12125550123`).
     */
    public ?string $phoneNumber;

    /**
     * Whether the user's phone number has been verified.
     */
    public ?bool $phoneNumberVerified;

    /**
     * The photo/avatar URL of the user.
     *
     * The maximum length is 2000 characters.
     */
    public ?string $imageUrl;

    /**
     * Whether the user is disabled.
     */
    public ?bool $disabled;

    public function __construct(
        ?string $id = null,
        ?string $displayName = null,
        ?string $email = null,
        ?bool $emailVerified = null,
        ?string $phoneNumber = null,
        ?bool $phoneNumberVerified = null,
        ?string $imageUrl = null,
        ?bool $disabled = null,
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
            'id' => $this->id,
            'displayName' => $this->displayName,
            'email' => $this->email,
            'emailVerified' => $this->emailVerified,
            'phoneNumber' => $this->phoneNumber,
            'phoneNumberVerified' => $this->phoneNumberVerified,
            'imageUrl' => $this->imageUrl,
            'disabled' => $this->disabled,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'emailVerified'} ?? null,
            $data->{'phoneNumber'} ?? null,
            $data->{'phoneNumberVerified'} ?? null,
            $data->{'imageUrl'} ?? null,
            $data->{'disabled'} ?? null,
        );
    }
}
