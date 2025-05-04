<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for listing custom users.
 */
final class ListCustomUsersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of users.
     *
     * @var CustomUser[]
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
    public ?string $nextPageToken;

    /**
     * @param null|CustomUser[] $users
     */
    public function __construct(
        ?array $users = null,
        ?string $nextPageToken = null,
    ) {
        $this->users = $users ?? [];
        $this->nextPageToken = $nextPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'users' => $this->users,
            'nextPageToken' => $this->nextPageToken,
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
