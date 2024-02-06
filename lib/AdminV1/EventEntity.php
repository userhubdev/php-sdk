<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The entity associated with event.
 */
class EventEntity implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the entity.
     */
    public string $id;

    public function __construct(
        null|string $id = null,
    ) {
        $this->id = $id ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new EventEntity(
            isset($data->{'id'}) ? $data->{'id'} : null,
        );
    }
}
