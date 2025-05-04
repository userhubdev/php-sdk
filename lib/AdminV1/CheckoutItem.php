<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Period;
use UserHub\Internal\JsonUnserializable;

/**
 * The checkout item.
 */
final class CheckoutItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The item identifier.
     */
    public string $id;

    /**
     * The display name for the item.
     */
    public string $displayName;

    /**
     * The input type of the item.
     */
    public string $inputType;

    /**
     * The type of the item.
     */
    public ?string $type;

    /**
     * The unit for the item.
     */
    public ?string $unit;

    /**
     * The price for the item.
     */
    public ?Price $price;

    /**
     * The quantity for the item.
     */
    public ?int $quantity;

    /**
     * The minimum quantity allowed.
     *
     * This will only be set when quantity is settable.
     */
    public ?int $minQuantity;

    /**
     * The maximum quantity allowed.
     *
     * This will only be set when the quantity is settable and there is a
     * discrete (non-infinity) maximum.
     */
    public ?int $maxQuantity;

    /**
     * The quantity at which the plan will renew.
     *
     * This will only be set when different from quantity and the
     * subscription is set to renew.
     */
    public ?int $renewQuantity;

    /**
     * The minimum renew quantity allowed.
     *
     * This will only be set when renew quantity is settable.
     */
    public ?int $minRenewQuantity;

    /**
     * The maximum renew quantity allowed.
     *
     * This will only be set when the new quantity is settable and there is a
     * discrete (non-infinity) maximum.
     */
    public ?int $maxRenewQuantity;

    /**
     * The billing period for the item.
     */
    public ?Period $period;

    /**
     * The subtotal amount at checkout.
     */
    public ?string $subtotalAmount;

    /**
     * The item-level discount amount at checkout.
     */
    public ?string $discountAmount;

    /**
     * The normal recurring amount.
     *
     * This does not include any time-limited discounts.
     */
    public ?string $renewAmount;

    /**
     * Whether this is a preview-only item.
     *
     * Preview-only items are generally prorations or other pending
     * charges or credits.
     */
    public ?bool $preview;

    /**
     * The item identifier for which you can group this item.
     *
     * This allows you to group credits and other preview items
     * with the related plan, seat, or add-on item.
     */
    public ?string $groupItemId;

    public function __construct(
        ?string $id = null,
        ?string $displayName = null,
        ?string $inputType = null,
        ?string $type = null,
        ?string $unit = null,
        ?Price $price = null,
        ?int $quantity = null,
        ?int $minQuantity = null,
        ?int $maxQuantity = null,
        ?int $renewQuantity = null,
        ?int $minRenewQuantity = null,
        ?int $maxRenewQuantity = null,
        ?Period $period = null,
        ?string $subtotalAmount = null,
        ?string $discountAmount = null,
        ?string $renewAmount = null,
        ?bool $preview = null,
        ?string $groupItemId = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? '';
        $this->inputType = $inputType ?? '';
        $this->type = $type ?? null;
        $this->unit = $unit ?? null;
        $this->price = $price ?? null;
        $this->quantity = $quantity ?? null;
        $this->minQuantity = $minQuantity ?? null;
        $this->maxQuantity = $maxQuantity ?? null;
        $this->renewQuantity = $renewQuantity ?? null;
        $this->minRenewQuantity = $minRenewQuantity ?? null;
        $this->maxRenewQuantity = $maxRenewQuantity ?? null;
        $this->period = $period ?? null;
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->renewAmount = $renewAmount ?? null;
        $this->preview = $preview ?? null;
        $this->groupItemId = $groupItemId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'displayName' => $this->displayName,
            'inputType' => $this->inputType,
            'type' => $this->type,
            'unit' => $this->unit,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'minQuantity' => $this->minQuantity,
            'maxQuantity' => $this->maxQuantity,
            'renewQuantity' => $this->renewQuantity,
            'minRenewQuantity' => $this->minRenewQuantity,
            'maxRenewQuantity' => $this->maxRenewQuantity,
            'period' => $this->period,
            'subtotalAmount' => $this->subtotalAmount,
            'discountAmount' => $this->discountAmount,
            'renewAmount' => $this->renewAmount,
            'preview' => $this->preview,
            'groupItemId' => $this->groupItemId,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'inputType'} ?? null,
            $data->{'type'} ?? null,
            $data->{'unit'} ?? null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
            $data->{'quantity'} ?? null,
            $data->{'minQuantity'} ?? null,
            $data->{'maxQuantity'} ?? null,
            $data->{'renewQuantity'} ?? null,
            $data->{'minRenewQuantity'} ?? null,
            $data->{'maxRenewQuantity'} ?? null,
            isset($data->{'period'}) ? Period::jsonUnserialize($data->{'period'}) : null,
            $data->{'subtotalAmount'} ?? null,
            $data->{'discountAmount'} ?? null,
            $data->{'renewAmount'} ?? null,
            $data->{'preview'} ?? null,
            $data->{'groupItemId'} ?? null,
        );
    }
}
