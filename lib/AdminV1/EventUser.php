<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The user associated with event.
 */
final class EventUser implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the user.
     */
    public string $id;

    /**
     * The human-readable display name of the user.
     *
     * NOTE: this is the current display name and not
     * the one as of the time of the event.
     */
    public null|string $displayName;

    /**
     * The email address of the user.
     *
     * NOTE: this is the current email and not
     * the one as of the time of the event.
     */
    public null|string $email;

    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|string $email = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
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
            $data->{'id'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
        );
    }
}
