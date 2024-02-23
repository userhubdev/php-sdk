<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for SearchOrganizations.
 */
final class SearchOrganizationsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The search of organizations.
     *
     * @var \UserHub\AdminV1\Organization[]
     */
    public array $organizations;

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
     * The estimated total count of matched organizations irrespective of pagination.
     *
     * This field is ignored if `show_total_size` is not true or `pageToken`
     * is not empty.
     */
    public null|int $totalSize;

    /**
     * @param null|\UserHub\AdminV1\Organization[] $organizations
     */
    public function __construct(
        null|array $organizations = null,
        null|string $nextPageToken = null,
        null|string $previousPageToken = null,
        null|int $totalSize = null,
    ) {
        $this->organizations = $organizations ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
        $this->previousPageToken = $previousPageToken ?? null;
        $this->totalSize = $totalSize ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organizations' => $this->organizations ?? null,
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
            isset($data->{'organizations'}) ? Util::mapArray($data->{'organizations'}, [Organization::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
            $data->{'totalSize'} ?? null,
        );
    }
}
