<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListPlanGroupChangePaths.
 */
class ListPlanGroupChangePathsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of change paths.
     *
     * @var \UserHub\AdminV1\PlanGroupChangePath[]
     */
    public array $planGroupChangePaths;

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

    public function __construct(
        null|array $planGroupChangePaths = null,
        null|string $nextPageToken = null,
        null|string $previousPageToken = null,
    ) {
        $this->planGroupChangePaths = $planGroupChangePaths ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'planGroupChangePaths' => $this->planGroupChangePaths ?? null,
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
            isset($data->{'planGroupChangePaths'}) ? Util::mapArray($data->{'planGroupChangePaths'}, [PlanGroupChangePath::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
        );
    }
}
