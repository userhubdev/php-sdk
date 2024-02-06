<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The subscription seat.
 */
class SubscriptionSeatInfo implements \JsonSerializable, JsonUnserializable
{
    /**
     * The subscription item product.
     */
    public null|\UserHub\UserV1\Product $product;

    /**
     * The quantity which has been invoiced for the current billing period.
     *
     * This might be less than the total quantity while a subscription change
     * is pending or if the subscription is over-provisioned.
     */
    public null|int $currentPeriodQuantity;

    /**
     * The quantity scheduled to appear on the next invoice.
     *
     * This will only be set when different from current period quantity.
     */
    public null|int $nextPeriodQuantity;

    /**
     * The quantity currently in use.
     */
    public null|int $assignedQuantity;

    /**
     * The quantity not in use.
     */
    public null|int $unassignedQuantity;

    /**
     * The sum of the assigned and unassigned quantities.
     */
    public null|int $totalQuantity;

    public function __construct(
        null|Product $product = null,
        null|int $currentPeriodQuantity = null,
        null|int $nextPeriodQuantity = null,
        null|int $assignedQuantity = null,
        null|int $unassignedQuantity = null,
        null|int $totalQuantity = null,
    ) {
        $this->product = $product ?? null;
        $this->currentPeriodQuantity = $currentPeriodQuantity ?? null;
        $this->nextPeriodQuantity = $nextPeriodQuantity ?? null;
        $this->assignedQuantity = $assignedQuantity ?? null;
        $this->unassignedQuantity = $unassignedQuantity ?? null;
        $this->totalQuantity = $totalQuantity ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => isset($this->product) ? $this->product : null,
            'currentPeriodQuantity' => isset($this->currentPeriodQuantity) ? $this->currentPeriodQuantity : null,
            'nextPeriodQuantity' => isset($this->nextPeriodQuantity) ? $this->nextPeriodQuantity : null,
            'assignedQuantity' => isset($this->assignedQuantity) ? $this->assignedQuantity : null,
            'unassignedQuantity' => isset($this->unassignedQuantity) ? $this->unassignedQuantity : null,
            'totalQuantity' => isset($this->totalQuantity) ? $this->totalQuantity : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new SubscriptionSeatInfo(
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            isset($data->{'currentPeriodQuantity'}) ? $data->{'currentPeriodQuantity'} : null,
            isset($data->{'nextPeriodQuantity'}) ? $data->{'nextPeriodQuantity'} : null,
            isset($data->{'assignedQuantity'}) ? $data->{'assignedQuantity'} : null,
            isset($data->{'unassignedQuantity'}) ? $data->{'unassignedQuantity'} : null,
            isset($data->{'totalQuantity'}) ? $data->{'totalQuantity'} : null,
        );
    }
}
