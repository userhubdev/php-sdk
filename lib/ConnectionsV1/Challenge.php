<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A challenge issued by webhooks to validate the
 * endpoint is working correctly.
 */
class Challenge implements \JsonSerializable, JsonUnserializable
{
    /**
     * The challenge string.
     */
    public string $challenge;

    public function __construct(
        null|string $challenge = null,
    ) {
        $this->challenge = $challenge ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'challenge' => $this->challenge ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'challenge'} ?? null,
        );
    }
}
