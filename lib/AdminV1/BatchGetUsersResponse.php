<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for BatchGetUsers.
 */
final class BatchGetUsersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The user results.
     *
     * @var UserResult[]
     */
    public array $users;

    /**
     * @param null|UserResult[] $users
     */
    public function __construct(
        ?array $users = null,
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
