<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ConnectionsV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Request message for listing custom users.
 */
final class ListCustomUsersRequest implements \JsonSerializable, JsonUnserializable
{
    /**
     * The maximum number of users to return. The webhook is allowed to
     * return fewer than this value, but it should never return more.
     */
    public int $pageSize;

    /**
     * A page token, this is from the response of the previous list
     * request.
     *
     * This should be used to determine the next page of results.
     */
    public null|string $pageToken;

    public function __construct(
        null|int $pageSize = null,
        null|string $pageToken = null,
    ) {
        $this->pageSize = $pageSize ?? 0;
        $this->pageToken = $pageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'pageSize' => $this->pageSize ?? null,
            'pageToken' => $this->pageToken ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'pageSize'} ?? null,
            $data->{'pageToken'} ?? null,
        );
    }
}
