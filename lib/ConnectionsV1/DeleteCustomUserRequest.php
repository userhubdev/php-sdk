<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Request message for deleting a custom user.
 */
class DeleteCustomUserRequest implements \JsonSerializable, JsonUnserializable
{
    /**
     * The external identifier for the user.
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
            'id' => $this->id ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
        );
    }
}
