<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\ApiV1\Status;
use UserHub\Internal\JsonUnserializable;

/**
 * The user or error.
 */
class UserResult implements \JsonSerializable, JsonUnserializable
{
    /**
     * The user.
     */
    public null|User $user;

    /**
     * The result error.
     */
    public null|Status $error;

    public function __construct(
        null|User $user = null,
        null|Status $error = null,
    ) {
        $this->user = $user ?? null;
        $this->error = $error ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'user' => $this->user ?? null,
            'error' => $this->error ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'error'}) ? Status::jsonUnserialize($data->{'error'}) : null,
        );
    }
}
