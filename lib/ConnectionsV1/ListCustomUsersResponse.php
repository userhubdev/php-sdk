<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for listing custom users.
 */
class ListCustomUsersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of users.
     *
     * @var \UserHub\ConnectionsV1\CustomUser[]
     */
    public array $users;

    /**
     * A token the webhook can set to indicate it has more results.
     *
     * This can be a page number, offset number, timestamp, or any value
     * the webhook handler wants to use for pagination.
     *
     * It must be encoded as a string.
     */
    public string $nextPageToken;

    public function __construct(
        null|array $users = null,
        null|string $nextPageToken = null,
    ) {
        $this->users = $users ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'users' => $this->users ?? null,
            'nextPageToken' => $this->nextPageToken ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'users'}) ? Util::mapArray($data->{'users'}, [CustomUser::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
        );
    }
}
