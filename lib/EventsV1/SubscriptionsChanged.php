<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\AdminV1\Subscription;
use UserHub\Internal\JsonUnserializable;

/**
 * The subscriptions changed event.
 */
class SubscriptionsChanged implements \JsonSerializable, JsonUnserializable
{
    /**
     * The subscription.
     */
    public null|Subscription $subscription;

    public function __construct(
        null|Subscription $subscription = null,
    ) {
        $this->subscription = $subscription ?? new Subscription();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'subscription' => $this->subscription ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'subscription'}) ? Subscription::jsonUnserialize($data->{'subscription'}) : null,
        );
    }
}
