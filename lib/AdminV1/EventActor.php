<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The actor associated with event.
 */
final class EventActor implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the actor.
     */
    public string $id;

    /**
     * The human-readable display name of the actor.
     *
     * NOTE: this is the current display name and not
     * the one as of the time of the event.
     */
    public null|string $displayName;

    /**
     * The email address of the actor.
     *
     * NOTE: this is the current email and not
     * the one as of the time of the event.
     */
    public null|string $email;

    /**
     * Whether the actor is a tenant admin.
     */
    public bool $admin;

    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|string $email = null,
        null|bool $admin = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->admin = $admin ?? false;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'displayName' => $this->displayName ?? null,
            'email' => $this->email ?? null,
            'admin' => $this->admin ?? null,
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
            $data->{'admin'} ?? null,
        );
    }
}
