<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for SearchUsers.
 */
final class SearchUsersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The search of users.
     *
     * @var \UserHub\AdminV1\User[]
     */
    public array $users;

    /**
     * A token, which can be sent as `pageToken` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     */
    public string $nextPageToken;

    /**
     * A token, which can be sent as `pageToken` to retrieve the previous page.
     * If this field is absent, there are no preceding pages. If this field is
     * an empty string then the previous page is the first result.
     */
    public null|string $previousPageToken;

    /**
     * The estimated total count of matched users irrespective of pagination.
     *
     * This field is ignored if `show_total_size` is not true or `pageToken`
     * is not empty.
     */
    public null|int $totalSize;

    /**
     * @param null|\UserHub\AdminV1\User[] $users
     */
    public function __construct(
        null|array $users = null,
        null|string $nextPageToken = null,
        null|string $previousPageToken = null,
        null|int $totalSize = null,
    ) {
        $this->users = $users ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
        $this->previousPageToken = $previousPageToken ?? null;
        $this->totalSize = $totalSize ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'users' => $this->users ?? null,
            'nextPageToken' => $this->nextPageToken ?? null,
            'previousPageToken' => $this->previousPageToken ?? null,
            'totalSize' => $this->totalSize ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'users'}) ? Util::mapArray($data->{'users'}, [User::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
            $data->{'totalSize'} ?? null,
        );
    }
}
