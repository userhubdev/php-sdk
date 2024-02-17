<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\AdminV1\User;
use UserHub\Internal\JsonUnserializable;

/**
 * The users changed event.
 */
class UsersChanged implements \JsonSerializable, JsonUnserializable
{
    /**
     * The user.
     */
    public null|\UserHub\AdminV1\User $user;

    public function __construct(
        null|User $user = null,
    ) {
        $this->user = $user ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'user' => $this->user ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
        );
    }
}
