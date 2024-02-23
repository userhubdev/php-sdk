<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListSubscriptions.
 */
final class ListSubscriptionsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of subscriptions.
     *
     * @var \UserHub\AdminV1\Subscription[]
     */
    public array $subscriptions;

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
     * @param null|\UserHub\AdminV1\Subscription[] $subscriptions
     */
    public function __construct(
        null|array $subscriptions = null,
        null|string $nextPageToken = null,
        null|string $previousPageToken = null,
    ) {
        $this->subscriptions = $subscriptions ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'subscriptions' => $this->subscriptions ?? null,
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
            isset($data->{'subscriptions'}) ? Util::mapArray($data->{'subscriptions'}, [Subscription::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
        );
    }
}
