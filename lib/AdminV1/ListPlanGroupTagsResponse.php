<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListPlanGroupTags.
 */
final class ListPlanGroupTagsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of plan group tags.
     *
     * @var PlanGroupTag[]
     */
    public array $planGroupTags;

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
    public ?string $previousPageToken;

    /**
     * @param null|PlanGroupTag[] $planGroupTags
     */
    public function __construct(
        ?array $planGroupTags = null,
        ?string $nextPageToken = null,
        ?string $previousPageToken = null,
    ) {
        $this->planGroupTags = $planGroupTags ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'planGroupTags' => $this->planGroupTags ?? null,
            'nextPageToken' => $this->nextPageToken ?? null,
            'previousPageToken' => $this->previousPageToken ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'planGroupTags'}) ? Util::mapArray($data->{'planGroupTags'}, [PlanGroupTag::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
        );
    }
}
