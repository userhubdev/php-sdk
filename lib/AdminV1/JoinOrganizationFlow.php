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
    public null|string $displayName;

    /**
     * The email address of the invitee.
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
            'displayName' => $this->displayName ?? null,
            'email' => $this->email ?? null,
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
        );
    }
}
