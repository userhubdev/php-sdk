<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The account view of the subscription.
 */
class AccountSubscription implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the subscription.
     */
    public null|string $id;

    /**
     * The state of the subscription.
     */
    public null|string $state;

    /**
     * The anchor time of the billing cycle.
     */
    public null|\DateTimeInterface $anchorTime;

    /**
     * The plan.
     */
    public null|\UserHub\AdminV1\AccountSubscriptionPlan $plan;

    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|\DateTimeInterface $anchorTime = null,
        null|AccountSubscriptionPlan $plan = null,
    ) {
        $this->id = $id ?? null;
        $this->state = $state ?? null;
        $this->anchorTime = $anchorTime ?? null;
        $this->plan = $plan ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'state' => isset($this->state) ? $this->state : null,
            'anchorTime' => isset($this->anchorTime) ? Util::encodeDateTime($this->anchorTime) : null,
            'plan' => isset($this->plan) ? $this->plan : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new AccountSubscription(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'anchorTime'}) ? Util::decodeDateTime($data->{'anchorTime'}) : null,
            isset($data->{'plan'}) ? AccountSubscriptionPlan::jsonUnserialize($data->{'plan'}) : null,
        );
    }
}
