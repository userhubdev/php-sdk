<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The subscription seat.
 */
class SubscriptionSeatInfo implements \JsonSerializable, JsonUnserializable
{
    /**
     * The seat product.
     */
    public null|\UserHub\AdminV1\Product $product;

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
     * The quantity available for use.
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
            'product' => $this->product ?? null,
            'currentPeriodQuantity' => $this->currentPeriodQuantity ?? null,
            'nextPeriodQuantity' => $this->nextPeriodQuantity ?? null,
            'assignedQuantity' => $this->assignedQuantity ?? null,
            'unassignedQuantity' => $this->unassignedQuantity ?? null,
            'totalQuantity' => $this->totalQuantity ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            $data->{'currentPeriodQuantity'} ?? null,
            $data->{'nextPeriodQuantity'} ?? null,
            $data->{'assignedQuantity'} ?? null,
            $data->{'unassignedQuantity'} ?? null,
            $data->{'totalQuantity'} ?? null,
        );
    }
}
