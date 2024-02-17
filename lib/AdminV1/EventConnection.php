<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The connection associated with the event.
 */
class EventConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the connection.
     */
    public string $id;

    /**
     * The human-readable display name of the connection.
     *
     * NOTE: this is the current display name and not
     * the one as of the time of the event.
     */
    public null|string $displayName;

    /**
     * The connection type.
     */
    public null|string $type;

    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|string $type = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? null;
        $this->type = $type ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'displayName' => $this->displayName ?? null,
            'type' => $this->type ?? null,
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
            $data->{'type'} ?? null,
        );
    }
}
