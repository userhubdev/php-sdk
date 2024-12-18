<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The subscription seat.
 */
final class SubscriptionSeatInfo implements \JsonSerializable, JsonUnserializable
{
    /**
     * The subscription item product.
     */
    public ?Product $product;

    /**
     * The quantity which has been invoiced for the current billing period.
     *
     * This might be less than the total quantity while a subscription change
     * is pending or if the subscription is over-provisioned.
     */
    public int $currentPeriodQuantity;

    /**
     * The quantity scheduled to appear on the next invoice.
     *
     * This will only be set when different from current period quantity.
     */
    public ?int $nextPeriodQuantity;

    /**
     * The quantity currently in use.
     */
    public int $assignedQuantity;

    /**
     * The quantity not in use.
     */
    public int $unassignedQuantity;

    /**
     * The sum of the assigned and unassigned quantities.
     */
    public int $totalQuantity;

    public function __construct(
        ?Product $product = null,
        ?int $currentPeriodQuantity = null,
        ?int $nextPeriodQuantity = null,
        ?int $assignedQuantity = null,
        ?int $unassignedQuantity = null,
        ?int $totalQuantity = null,
    ) {
        $this->product = $product ?? null;
        $this->currentPeriodQuantity = $currentPeriodQuantity ?? 0;
        $this->nextPeriodQuantity = $nextPeriodQuantity ?? null;
        $this->assignedQuantity = $assignedQuantity ?? 0;
        $this->unassignedQuantity = $unassignedQuantity ?? 0;
        $this->totalQuantity = $totalQuantity ?? 0;
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
