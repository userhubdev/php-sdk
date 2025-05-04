<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListMembers.
 */
final class ListMembersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of members.
     *
     * @var Member[]
     */
    public array $members;

    /**
     * A token, which can be sent as `pageToken` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     */
    public ?string $nextPageToken;

    /**
     * A token, which can be sent as `pageToken` to retrieve the previous page.
     * If this field is absent, there are no preceding pages. If this field is
     * an empty string then the previous page is the first result.
     */
    public ?string $previousPageToken;

    /**
     * @param null|Member[] $members
     */
    public function __construct(
        ?array $members = null,
        ?string $nextPageToken = null,
        ?string $previousPageToken = null,
    ) {
        $this->members = $members ?? [];
        $this->nextPageToken = $nextPageToken ?? null;
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'members' => $this->members,
            'nextPageToken' => $this->nextPageToken,
            'previousPageToken' => $this->previousPageToken,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'members'}) ? Util::mapArray($data->{'members'}, [Member::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
        );
    }
}
