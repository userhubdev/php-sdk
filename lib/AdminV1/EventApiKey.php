<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The API key associated with event.
 */
final class EventApiKey implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the API key.
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
