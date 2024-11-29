<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The account view of the subscription.
 */
final class AccountSubscription implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the subscription.
     */
    public string $id;

    /**
     * The state of the subscription.
     */
    public string $state;

    /**
     * The anchor time of the billing cycle.
     */
    public ?\DateTimeInterface $anchorTime;

    /**
     * The subscription plan.
     */
    public ?AccountSubscriptionPlan $plan;

    /**
     * The user's seat.
     *
     * This will only be set for organization subscriptions where
     * the user has been assigned a seat.
     */
    public ?AccountSubscriptionSeat $seat;

    public function __construct(
        ?string $id = null,
        ?string $state = null,
        ?\DateTimeInterface $anchorTime = null,
        ?AccountSubscriptionPlan $plan = null,
        ?AccountSubscriptionSeat $seat = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->anchorTime = $anchorTime ?? null;
        $this->plan = $plan ?? null;
        $this->seat = $seat ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'state' => $this->state ?? null,
            'anchorTime' => isset($this->anchorTime) ? Util::encodeDateTime($this->anchorTime) : null,
            'plan' => $this->plan ?? null,
            'seat' => $this->seat ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'state'} ?? null,
            isset($data->{'anchorTime'}) ? Util::decodeDateTime($data->{'anchorTime'}) : null,
            isset($data->{'plan'}) ? AccountSubscriptionPlan::jsonUnserialize($data->{'plan'}) : null,
            isset($data->{'seat'}) ? AccountSubscriptionSeat::jsonUnserialize($data->{'seat'}) : null,
        );
    }
}
