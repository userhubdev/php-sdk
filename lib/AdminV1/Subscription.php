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
    public ?string $stateReason;

    /**
     * The billing connection.
     */
    public ?Connection $connection;

    /**
     * The external identifier of the subscription.
     */
    public ?string $externalId;

    /**
     * The plan.
     */
    public ?Plan $plan;

    /**
     * The currency code for the subscription (e.g. `USD`).
     */
    public ?string $currencyCode;

    /**
     * The subscription items.
     *
     * @var SubscriptionItem[]
     */
    public array $items;

    /**
     * The seat information.
     *
     * @var SubscriptionSeatInfo[]
     */
    public array $seats;

    /**
     * The payment method.
     */
    public ?PaymentMethod $paymentMethod;

    /**
     * Whether the subscription is scheduled to be canceled
     * at the end of the current billing period.
     */
    public ?bool $cancelPeriodEnd;

    /**
     * The anchor time for the billing cycle.
     */
    public ?\DateTimeInterface $anchorTime;

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
     * The organization owner of the subscription.
     *
     * The ID field of this object must be populated if
     * if user isn't specified.
     */
    public ?Organization $organization;

    /**
     * The user owner of the subscription.
     *
     * The ID field of this object must be populated if
     * if organization isn't specified.
     */
    public ?User $user;

    /**
     * Whether the subscription is the default for the account.
     */
    public bool $default;

    /**
     * The last time the subscription was pulled from the connection.
     */
    public ?\DateTimeInterface $pullTime;

    /**
     * The last time the subscription was pushed to the connection.
     */
    public ?\DateTimeInterface $pushTime;

    /**
     * The subscription view.
     */
    public string $view;

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
        ?string $stateReason = null,
        ?Connection $connection = null,
        ?string $externalId = null,
        ?Plan $plan = null,
        ?string $currencyCode = null,
        ?array $items = null,
        ?array $seats = null,
        ?PaymentMethod $paymentMethod = null,
        ?bool $cancelPeriodEnd = null,
        ?\DateTimeInterface $anchorTime = null,
        ?\DateTimeInterface $startTime = null,
        ?\DateTimeInterface $endTime = null,
        ?SubscriptionTrial $trial = null,
        ?SubscriptionCurrentPeriod $currentPeriod = null,
        ?Organization $organization = null,
        ?User $user = null,
        ?bool $default = null,
        ?\DateTimeInterface $pullTime = null,
        ?\DateTimeInterface $pushTime = null,
        ?string $view = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
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
        $this->view = $view ?? '';
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'connection' => $this->connection,
            'externalId' => $this->externalId,
            'plan' => $this->plan,
            'currencyCode' => $this->currencyCode,
            'items' => $this->items,
            'seats' => $this->seats,
            'paymentMethod' => $this->paymentMethod,
            'cancelPeriodEnd' => $this->cancelPeriodEnd,
            'anchorTime' => Util::encodeDateTime($this->anchorTime),
            'startTime' => Util::encodeDateTime($this->startTime),
            'endTime' => Util::encodeDateTime($this->endTime),
            'trial' => $this->trial,
            'currentPeriod' => $this->currentPeriod,
            'organization' => $this->organization,
            'user' => $this->user,
            'default' => $this->default,
            'pullTime' => Util::encodeDateTime($this->pullTime),
            'pushTime' => Util::encodeDateTime($this->pushTime),
            'view' => $this->view,
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
            $data->{'view'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
