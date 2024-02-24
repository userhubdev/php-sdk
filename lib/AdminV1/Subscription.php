<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The representation of an activated plan.
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
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The billing connection.
     */
    public null|Connection $connection;

    /**
     * The external identifier of the subscription.
     */
    public null|string $externalId;

    /**
     * The plan.
     */
    public null|Plan $plan;

    /**
     * The currency code for the subscription (e.g. `USD`).
     */
    public null|string $currencyCode;

    /**
     * The subscription items.
     *
     * @var \UserHub\AdminV1\SubscriptionItem[]
     */
    public array $items;

    /**
     * The seat information.
     *
     * @var \UserHub\AdminV1\SubscriptionSeatInfo[]
     */
    public array $seats;

    /**
     * The payment method.
     */
    public null|PaymentMethod $paymentMethod;

    /**
     * Whether the subscription is scheduled to be canceled
     * at the end of the current billing period.
     */
    public null|bool $cancelPeriodEnd;

    /**
     * The anchor time for the billing cycle.
     */
    public null|\DateTimeInterface $anchorTime;

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
    public null|SubscriptionTrial $trial;

    /**
     * The current billing period for the subscription.
     */
    public null|SubscriptionCurrentPeriod $currentPeriod;

    /**
     * The organization owner of the subscription.
     *
     * The ID field of this object must be populated if
     * if user isn't specified.
     */
    public null|Organization $organization;

    /**
     * The user owner of the subscription.
     *
     * The ID field of this object must be populated if
     * if organization isn't specified.
     */
    public null|User $user;

    /**
     * Whether the subscription is the default for the account.
     */
    public bool $default;

    /**
     * The last time the subscription was pulled from the connection.
     */
    public null|\DateTimeInterface $pullTime;

    /**
     * The last time the subscription was pushed to the connection.
     */
    public null|\DateTimeInterface $pushTime;

    /**
     * The creation time of the subscription.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the subscription.
     */
    public \DateTimeInterface $updateTime;

    /**
     * @param null|\UserHub\AdminV1\SubscriptionItem[]     $items
     * @param null|\UserHub\AdminV1\SubscriptionSeatInfo[] $seats
     */
    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|Connection $connection = null,
        null|string $externalId = null,
        null|Plan $plan = null,
        null|string $currencyCode = null,
        null|array $items = null,
        null|array $seats = null,
        null|PaymentMethod $paymentMethod = null,
        null|bool $cancelPeriodEnd = null,
        null|\DateTimeInterface $anchorTime = null,
        null|\DateTimeInterface $startTime = null,
        null|\DateTimeInterface $endTime = null,
        null|SubscriptionTrial $trial = null,
        null|SubscriptionCurrentPeriod $currentPeriod = null,
        null|Organization $organization = null,
        null|User $user = null,
        null|bool $default = null,
        null|\DateTimeInterface $pullTime = null,
        null|\DateTimeInterface $pushTime = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->connection = $connection ?? null;
        $this->externalId = $externalId ?? null;
        $this->plan = $plan ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->items = $items ?? [];
        $this->seats = $seats ?? [];
        $this->paymentMethod = $paymentMethod ?? null;
        $this->cancelPeriodEnd = $cancelPeriodEnd ?? null;
        $this->anchorTime = $anchorTime ?? null;
        $this->startTime = $startTime ?? null;
        $this->endTime = $endTime ?? null;
        $this->trial = $trial ?? null;
        $this->currentPeriod = $currentPeriod ?? null;
        $this->organization = $organization ?? null;
        $this->user = $user ?? null;
        $this->default = $default ?? false;
        $this->pullTime = $pullTime ?? null;
        $this->pushTime = $pushTime ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'state' => $this->state ?? null,
            'stateReason' => $this->stateReason ?? null,
            'connection' => $this->connection ?? null,
            'externalId' => $this->externalId ?? null,
            'plan' => $this->plan ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'items' => $this->items ?? null,
            'seats' => $this->seats ?? null,
            'paymentMethod' => $this->paymentMethod ?? null,
            'cancelPeriodEnd' => $this->cancelPeriodEnd ?? null,
            'anchorTime' => isset($this->anchorTime) ? Util::encodeDateTime($this->anchorTime) : null,
            'startTime' => isset($this->startTime) ? Util::encodeDateTime($this->startTime) : null,
            'endTime' => isset($this->endTime) ? Util::encodeDateTime($this->endTime) : null,
            'trial' => $this->trial ?? null,
            'currentPeriod' => $this->currentPeriod ?? null,
            'organization' => $this->organization ?? null,
            'user' => $this->user ?? null,
            'default' => $this->default ?? null,
            'pullTime' => isset($this->pullTime) ? Util::encodeDateTime($this->pullTime) : null,
            'pushTime' => isset($this->pushTime) ? Util::encodeDateTime($this->pushTime) : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
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
            $data->{'stateReason'} ?? null,
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            $data->{'externalId'} ?? null,
            isset($data->{'plan'}) ? Plan::jsonUnserialize($data->{'plan'}) : null,
            $data->{'currencyCode'} ?? null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [SubscriptionItem::class, 'jsonUnserialize']) : null,
            isset($data->{'seats'}) ? Util::mapArray($data->{'seats'}, [SubscriptionSeatInfo::class, 'jsonUnserialize']) : null,
            isset($data->{'paymentMethod'}) ? PaymentMethod::jsonUnserialize($data->{'paymentMethod'}) : null,
            $data->{'cancelPeriodEnd'} ?? null,
            isset($data->{'anchorTime'}) ? Util::decodeDateTime($data->{'anchorTime'}) : null,
            isset($data->{'startTime'}) ? Util::decodeDateTime($data->{'startTime'}) : null,
            isset($data->{'endTime'}) ? Util::decodeDateTime($data->{'endTime'}) : null,
            isset($data->{'trial'}) ? SubscriptionTrial::jsonUnserialize($data->{'trial'}) : null,
            isset($data->{'currentPeriod'}) ? SubscriptionCurrentPeriod::jsonUnserialize($data->{'currentPeriod'}) : null,
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            $data->{'default'} ?? null,
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'pushTime'}) ? Util::decodeDateTime($data->{'pushTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
