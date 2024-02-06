<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The organization associated with event.
 */
class EventOrganization implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the organization.
     */
    public string $id;

    /**
     * The human-readable display name of the organization.
     *
     * NOTE: this is the current display name and not
     * the one as of the time of the event.
     */
    public null|string $displayName;

    /**
     * The email address of the organization.
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
            'id' => isset($this->id) ? $this->id : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'email' => isset($this->email) ? $this->email : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new EventOrganization(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
        );
    }
}
