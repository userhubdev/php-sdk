<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The actor associated with event.
 */
class EventActor implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the actor.
     */
    public null|string $id;

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
    public null|bool $admin;

    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|string $email = null,
        null|bool $admin = null,
    ) {
        $this->id = $id ?? null;
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->admin = $admin ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'email' => isset($this->email) ? $this->email : null,
            'admin' => isset($this->admin) ? $this->admin : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new EventActor(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
            isset($data->{'admin'}) ? $data->{'admin'} : null,
        );
    }
}
