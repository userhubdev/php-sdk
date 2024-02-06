<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The user's or organization's subscription.
 */
class Subscription implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the subscription.
     */
    public string $id;

    /**
     * The status of the subscription.
     */
    public string $state;

    /**
     * The currency code for the subscription (e.g. `USD`).
     */
    public null|string $currencyCode;

    /**
     * The subscription items.
     */
    public null|\UserHub\UserV1\Plan $plan;

    /**
     * The payment method.
     */
    public null|\UserHub\UserV1\PaymentMethod $paymentMethod;

    /**
     * The subscription is scheduled to be canceled at the end of the
     * current billing period.
     */
    public null|bool $cancelPeriodEnd;

    /**
     * The time the subscription started.
     */
    public null|\DateTimeInterface $startTime;

    /**
     * The time the subscription ends/ended.
     */
    public null|\DateTimeInterface $endTime;

    /**
     * The trial information for the subscription.
     */
    public null|\UserHub\UserV1\SubscriptionTrial $trial;

    /**
     * The current billing period for the subscription.
     */
    public null|\UserHub\UserV1\SubscriptionCurrentPeriod $currentPeriod;

    /**
     * The subscription items.
     *
     * @var \UserHub\UserV1\SubscriptionItem[]
     */
    public array $items;

    /**
     * The information about the various seats available in
     * the subscription.
     *
     * @var \UserHub\UserV1\SubscriptionSeatInfo[]
     */
    public array $seats;

    /**
     * The creation time of the subscription.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the subscription.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|string $currencyCode = null,
        null|Plan $plan = null,
        null|PaymentMethod $paymentMethod = null,
        null|bool $cancelPeriodEnd = null,
        null|\DateTimeInterface $startTime = null,
        null|\DateTimeInterface $endTime = null,
        null|SubscriptionTrial $trial = null,
        null|SubscriptionCurrentPeriod $currentPeriod = null,
        null|array $items = null,
        null|array $seats = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->currencyCode = $currencyCode ?? null;
        $this->plan = $plan ?? null;
        $this->paymentMethod = $paymentMethod ?? null;
        $this->cancelPeriodEnd = $cancelPeriodEnd ?? null;
        $this->startTime = $startTime ?? null;
        $this->endTime = $endTime ?? null;
        $this->trial = $trial ?? null;
        $this->currentPeriod = $currentPeriod ?? null;
        $this->items = $items ?? [];
        $this->seats = $seats ?? [];
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'state' => isset($this->state) ? $this->state : null,
            'currencyCode' => isset($this->currencyCode) ? $this->currencyCode : null,
            'plan' => isset($this->plan) ? $this->plan : null,
            'paymentMethod' => isset($this->paymentMethod) ? $this->paymentMethod : null,
            'cancelPeriodEnd' => isset($this->cancelPeriodEnd) ? $this->cancelPeriodEnd : null,
            'startTime' => isset($this->startTime) ? Util::encodeDateTime($this->startTime) : null,
            'endTime' => isset($this->endTime) ? Util::encodeDateTime($this->endTime) : null,
            'trial' => isset($this->trial) ? $this->trial : null,
            'currentPeriod' => isset($this->currentPeriod) ? $this->currentPeriod : null,
            'items' => isset($this->items) ? $this->items : null,
            'seats' => isset($this->seats) ? $this->seats : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Subscription(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'currencyCode'}) ? $data->{'currencyCode'} : null,
            isset($data->{'plan'}) ? Plan::jsonUnserialize($data->{'plan'}) : null,
            isset($data->{'paymentMethod'}) ? PaymentMethod::jsonUnserialize($data->{'paymentMethod'}) : null,
            isset($data->{'cancelPeriodEnd'}) ? $data->{'cancelPeriodEnd'} : null,
            isset($data->{'startTime'}) ? Util::decodeDateTime($data->{'startTime'}) : null,
            isset($data->{'endTime'}) ? Util::decodeDateTime($data->{'endTime'}) : null,
            isset($data->{'trial'}) ? SubscriptionTrial::jsonUnserialize($data->{'trial'}) : null,
            isset($data->{'currentPeriod'}) ? SubscriptionCurrentPeriod::jsonUnserialize($data->{'currentPeriod'}) : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [SubscriptionItem::class, 'jsonUnserialize']) : null,
            isset($data->{'seats'}) ? Util::mapArray($data->{'seats'}, [SubscriptionSeatInfo::class, 'jsonUnserialize']) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
