<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListEvents.
 */
final class ListEventsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of events.
     *
     * @var Event[]
     */
    public array $events;

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
     * @param null|Event[] $events
     */
    public function __construct(
        ?array $events = null,
        ?string $nextPageToken = null,
        ?string $previousPageToken = null,
    ) {
        $this->events = $events ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'events' => $this->events ?? null,
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
            isset($data->{'events'}) ? Util::mapArray($data->{'events'}, [Event::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
        );
    }
}
