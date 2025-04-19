<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\AdminV1\Subscription;
use UserHub\Internal\JsonUnserializable;

/**
 * The subscriptions changed event.
 */
final class SubscriptionsChanged implements \JsonSerializable, JsonUnserializable
{
    /**
     * The subscription.
     */
    public ?Subscription $subscription;

    public function __construct(
        ?Subscription $subscription = null,
    ) {
        $this->subscription = $subscription ?? new Subscription();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'subscription' => $this->subscription,
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
