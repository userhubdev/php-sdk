<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListPlanGroupRevisions.
 */
class ListPlanGroupRevisionsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of revisions.
     *
     * @var \UserHub\AdminV1\PlanGroupRevision[]
     */
    public array $planGroupRevisions;

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
        null|array $planGroupRevisions = null,
        null|string $nextPageToken = null,
        null|string $previousPageToken = null,
    ) {
        $this->planGroupRevisions = $planGroupRevisions ?? [];
        $this->nextPageToken = $nextPageToken ?? null;
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'planGroupRevisions' => isset($this->planGroupRevisions) ? $this->planGroupRevisions : null,
            'nextPageToken' => isset($this->nextPageToken) ? $this->nextPageToken : null,
            'previousPageToken' => isset($this->previousPageToken) ? $this->previousPageToken : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new ListPlanGroupRevisionsResponse(
            isset($data->{'planGroupRevisions'}) ? Util::mapArray($data->{'planGroupRevisions'}, [PlanGroupRevision::class, 'jsonUnserialize']) : null,
            isset($data->{'nextPageToken'}) ? $data->{'nextPageToken'} : null,
            isset($data->{'previousPageToken'}) ? $data->{'previousPageToken'} : null,
        );
    }
}
