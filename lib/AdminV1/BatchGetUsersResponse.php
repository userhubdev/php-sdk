<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for BatchGetUsers.
 */
class BatchGetUsersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The user results.
     *
     * @var \UserHub\AdminV1\UserResult[]
     */
    public array $users;

    public function __construct(
        null|array $users = null,
    ) {
        $this->users = $users ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'users' => $this->users ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'users'}) ? Util::mapArray($data->{'users'}, [UserResult::class, 'jsonUnserialize']) : null,
        );
    }
}
