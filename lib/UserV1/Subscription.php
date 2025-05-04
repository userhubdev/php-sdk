<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The user's or organization's subscription.
 */
final class Subscription implements \JsonSerializable, JsonUnserializable
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
    public ?string $currencyCode;

    /**
     * The subscription items.
     */
    public ?Plan $plan;

    /**
     * The payment method.
     */
    public ?PaymentMethod $paymentMethod;

    /**
     * The subscription is scheduled to be canceled at the end of the
     * current billing period.
     */
    public ?bool $renewCanceled;

    /**
     * The subscription is scheduled to be canceled at the end of the
     * current billing period.
     *
     * @deprecated use `renewCanceled` instead
     */
    public ?bool $cancelPeriodEnd;

    /**
     * The time the subscription started.
     */
    public ?\DateTimeInterface $startTime;

    /**
     * The time the subscription ends/ended.
     */
    public ?\DateTimeInterface $endTime;

    /**
     * The trial information for the subscription.
     */
    public ?SubscriptionTrial $trial;

    /**
     * The current billing period for the subscription.
     */
    public ?SubscriptionCurrentPeriod $currentPeriod;

    /**
     * The subscription items.
     *
     * @var SubscriptionItem[]
     */
    public array $items;

    /**
     * The information about the various seats available in
     * the subscription.
     *
     * @var SubscriptionSeatInfo[]
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

    /**
     * @param null|SubscriptionItem[]     $items
     * @param null|SubscriptionSeatInfo[] $seats
     */
    public function __construct(
        ?string $id = null,
        ?string $state = null,
        ?string $currencyCode = null,
        ?Plan $plan = null,
        ?PaymentMethod $paymentMethod = null,
        ?bool $renewCanceled = null,
        ?bool $cancelPeriodEnd = null,
        ?\DateTimeInterface $startTime = null,
        ?\DateTimeInterface $endTime = null,
        ?SubscriptionTrial $trial = null,
        ?SubscriptionCurrentPeriod $currentPeriod = null,
        ?array $items = null,
        ?array $seats = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->currencyCode = $currencyCode ?? null;
        $this->plan = $plan ?? null;
        $this->paymentMethod = $paymentMethod ?? null;
        $this->renewCanceled = $renewCanceled ?? null;
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
            'id' => $this->id,
            'state' => $this->state,
            'currencyCode' => $this->currencyCode,
            'plan' => $this->plan,
            'paymentMethod' => $this->paymentMethod,
            'renewCanceled' => $this->renewCanceled,
            'cancelPeriodEnd' => $this->cancelPeriodEnd,
            'startTime' => Util::encodeDateTime($this->startTime),
            'endTime' => Util::encodeDateTime($this->endTime),
            'trial' => $this->trial,
            'currentPeriod' => $this->currentPeriod,
            'items' => $this->items,
            'seats' => $this->seats,
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
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
            $data->{'currencyCode'} ?? null,
            isset($data->{'plan'}) ? Plan::jsonUnserialize($data->{'plan'}) : null,
            isset($data->{'paymentMethod'}) ? PaymentMethod::jsonUnserialize($data->{'paymentMethod'}) : null,
            $data->{'renewCanceled'} ?? null,
            $data->{'cancelPeriodEnd'} ?? null,
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
