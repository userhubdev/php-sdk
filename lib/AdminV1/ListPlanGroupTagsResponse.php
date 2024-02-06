<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListPlanGroupTags.
 */
class ListPlanGroupTagsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of plan group tags.
     *
     * @var \UserHub\AdminV1\PlanGroupTag[]
     */
    public array $planGroupTags;

    /**
     * A token, which can be sent as `pageToken` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     */
    public null|string $nextPageToken;

    /**
     * A token, which can be sent as `pageToken` to retrieve the previous page.
     * If this field is absent, there are no preceding pages. If this field is
     * an empty string then the previous page is the first result.
     */
    public null|string $previousPageToken;

    public function __construct(
        null|array $planGroupTags = null,
        null|string $nextPageToken = null,
        null|string $previousPageToken = null,
    ) {
        $this->planGroupTags = $planGroupTags ?? [];
        $this->nextPageToken = $nextPageToken ?? null;
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'planGroupTags' => isset($this->planGroupTags) ? $this->planGroupTags : null,
            'nextPageToken' => isset($this->nextPageToken) ? $this->nextPageToken : null,
            'previousPageToken' => isset($this->previousPageToken) ? $this->previousPageToken : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new ListPlanGroupTagsResponse(
            isset($data->{'planGroupTags'}) ? Util::mapArray($data->{'planGroupTags'}, [PlanGroupTag::class, 'jsonUnserialize']) : null,
            isset($data->{'nextPageToken'}) ? $data->{'nextPageToken'} : null,
            isset($data->{'previousPageToken'}) ? $data->{'previousPageToken'} : null,
        );
    }
}
