<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Period;
use UserHub\Internal\JsonUnserializable;

/**
 * The line items for the preview.
 */
final class InvoicePreviewItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The details of the associated product.
     */
    public ?Product $product;

    /**
     * The details of the associated price.
     */
    public ?Price $price;

    /**
     * The quantity of the item product/price.
     */
    public ?int $quantity;

    /**
     * The total amount for the line item excluding
     * taxes and discounts.
     */
    public ?string $subtotalAmount;

    /**
     * The item-level discount amount.
     */
    public ?string $discountAmount;

    /**
     * The user facing description for the line item.
     */
    public ?string $description;

    /**
     * Whether the item was a proration.
     */
    public ?bool $proration;

    /**
     * The billing period for the item.
     */
    public ?Period $period;

    public function __construct(
        ?Product $product = null,
        ?Price $price = null,
        ?int $quantity = null,
        ?string $subtotalAmount = null,
        ?string $discountAmount = null,
        ?string $description = null,
        ?bool $proration = null,
        ?Period $period = null,
    ) {
        $this->product = $product ?? null;
        $this->price = $price ?? null;
        $this->quantity = $quantity ?? null;
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->description = $description ?? null;
        $this->proration = $proration ?? null;
        $this->period = $period ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'product' => $this->product ?? null,
            'price' => $this->price ?? null,
            'quantity' => $this->quantity ?? null,
            'subtotalAmount' => $this->subtotalAmount ?? null,
            'discountAmount' => $this->discountAmount ?? null,
            'description' => $this->description ?? null,
            'proration' => $this->proration ?? null,
            'period' => $this->period ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
            $data->{'quantity'} ?? null,
            $data->{'subtotalAmount'} ?? null,
            $data->{'discountAmount'} ?? null,
            $data->{'description'} ?? null,
            $data->{'proration'} ?? null,
            isset($data->{'period'}) ? Period::jsonUnserialize($data->{'period'}) : null,
        );
    }
}
