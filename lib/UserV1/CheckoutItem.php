<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

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
     * The type of the item.
     */
    public string $type;

    /**
     * The display name for the item.
     */
    public string $displayName;

    /**
     * The quantity for the item.
     */
    public ?Price $price;

    /**
     * The quantity for the item.
     */
    public ?int $quantity;

    /**
     * The quantity the plan is set to renew at.
     */
    public ?int $renewQuantity;

    /**
     * The minimum quantity allowed.
     */
    public ?int $minQuantity;

    /**
     * The maximum quantity allowed.
     */
    public ?int $maxQuantity;

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
     * The item-level normal recurring amount.
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
     * The parent item.
     *
     * This allows you to group related items and is generally set for preview
     * items.
     */
    public ?string $parentItemId;

    public function __construct(
        ?string $id = null,
        ?string $type = null,
        ?string $displayName = null,
        ?Price $price = null,
        ?int $quantity = null,
        ?int $renewQuantity = null,
        ?int $minQuantity = null,
        ?int $maxQuantity = null,
        ?Period $period = null,
        ?string $subtotalAmount = null,
        ?string $discountAmount = null,
        ?string $renewAmount = null,
        ?bool $preview = null,
        ?string $parentItemId = null,
    ) {
        $this->id = $id ?? '';
        $this->type = $type ?? '';
        $this->displayName = $displayName ?? '';
        $this->price = $price ?? null;
        $this->quantity = $quantity ?? null;
        $this->renewQuantity = $renewQuantity ?? null;
        $this->minQuantity = $minQuantity ?? null;
        $this->maxQuantity = $maxQuantity ?? null;
        $this->period = $period ?? null;
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->renewAmount = $renewAmount ?? null;
        $this->preview = $preview ?? null;
        $this->parentItemId = $parentItemId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'displayName' => $this->displayName ?? null,
            'price' => $this->price ?? null,
            'quantity' => $this->quantity ?? null,
            'renewQuantity' => $this->renewQuantity ?? null,
            'minQuantity' => $this->minQuantity ?? null,
            'maxQuantity' => $this->maxQuantity ?? null,
            'period' => $this->period ?? null,
            'subtotalAmount' => $this->subtotalAmount ?? null,
            'discountAmount' => $this->discountAmount ?? null,
            'renewAmount' => $this->renewAmount ?? null,
            'preview' => $this->preview ?? null,
            'parentItemId' => $this->parentItemId ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'type'} ?? null,
            $data->{'displayName'} ?? null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
            $data->{'quantity'} ?? null,
            $data->{'renewQuantity'} ?? null,
            $data->{'minQuantity'} ?? null,
            $data->{'maxQuantity'} ?? null,
            isset($data->{'period'}) ? Period::jsonUnserialize($data->{'period'}) : null,
            $data->{'subtotalAmount'} ?? null,
            $data->{'discountAmount'} ?? null,
            $data->{'renewAmount'} ?? null,
            $data->{'preview'} ?? null,
            $data->{'parentItemId'} ?? null,
        );
    }
}
