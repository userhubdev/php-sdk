<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The subscription seat.
 */
final class SubscriptionSeatInfo implements \JsonSerializable, JsonUnserializable
{
    /**
     * Whether a seat can be assigned or reserved.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public ?string $stateReason;

    /**
     * The seat product.
     */
    public ?Product $product;

    /**
     * The number of seats expected to be invoiced for the current billing period.
     *
     * This might be less than the total quantity while a subscription change
     * is pending or if the subscription is over-provisioned.
     */
    public int $currentQuantity;

    /**
     * The number of seats expected at renewal.
     *
     * This will only be set when different from current quantity.
     */
    public ?int $renewQuantity;

    /**
     * The number of seats currently assigned.
     */
    public int $assignedQuantity;

    /**
     * The number of seats not assigned.
     */
    public int $unassignedQuantity;

    /**
     * The number of seats currently reserved because of pending invitations.
     *
     * These can be made available by cancelling outstanding invitations.
     */
    public ?int $reservedQuantity;

    /**
     * The number of seats which can be assigned or reserved.
     */
    public ?int $availableQuantity;

    /**
     * The total number of seats associated with the subscription.
     */
    public int $totalQuantity;

    public function __construct(
        ?string $state = null,
        ?string $stateReason = null,
        ?Product $product = null,
        ?int $currentQuantity = null,
        ?int $renewQuantity = null,
        ?int $assignedQuantity = null,
        ?int $unassignedQuantity = null,
        ?int $reservedQuantity = null,
        ?int $availableQuantity = null,
        ?int $totalQuantity = null,
    ) {
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->product = $product ?? null;
        $this->currentQuantity = $currentQuantity ?? 0;
        $this->renewQuantity = $renewQuantity ?? null;
        $this->assignedQuantity = $assignedQuantity ?? 0;
        $this->unassignedQuantity = $unassignedQuantity ?? 0;
        $this->reservedQuantity = $reservedQuantity ?? null;
        $this->availableQuantity = $availableQuantity ?? null;
        $this->totalQuantity = $totalQuantity ?? 0;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'product' => $this->product,
            'currentQuantity' => $this->currentQuantity,
            'renewQuantity' => $this->renewQuantity,
            'assignedQuantity' => $this->assignedQuantity,
            'unassignedQuantity' => $this->unassignedQuantity,
            'reservedQuantity' => $this->reservedQuantity,
            'availableQuantity' => $this->availableQuantity,
            'totalQuantity' => $this->totalQuantity,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            $data->{'currentQuantity'} ?? null,
            $data->{'renewQuantity'} ?? null,
            $data->{'assignedQuantity'} ?? null,
            $data->{'unassignedQuantity'} ?? null,
            $data->{'reservedQuantity'} ?? null,
            $data->{'availableQuantity'} ?? null,
            $data->{'totalQuantity'} ?? null,
        );
    }
}
