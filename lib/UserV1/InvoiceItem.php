<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\CommonV1\Period;
use UserHub\Internal\JsonUnserializable;

/**
 * The line items for the invoice.
 */
class InvoiceItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the item.
     */
    public string $id;

    /**
     * The details of the associated product.
     */
    public null|\UserHub\UserV1\Product $product;

    /**
     * The details of the associated price.
     */
    public null|\UserHub\UserV1\Price $price;

    /**
     * The quantity of the item product/price.
     */
    public null|int $quantity;

    /**
     * The total amount for the line item excluding
     * taxes and discounts.
     */
    public null|string $subtotalAmount;

    /**
     * The item-level discount amount.
     */
    public null|string $discountAmount;

    /**
     * The user facing description for the line item.
     */
    public null|string $description;

    /**
     * Whether the item was a proration.
     */
    public null|bool $proration;

    /**
     * The billing period for the item.
     */
    public null|\UserHub\CommonV1\Period $period;

    public function __construct(
        null|string $id = null,
        null|Product $product = null,
        null|Price $price = null,
        null|int $quantity = null,
        null|string $subtotalAmount = null,
        null|string $discountAmount = null,
        null|string $description = null,
        null|bool $proration = null,
        null|Period $period = null,
    ) {
        $this->id = $id ?? '';
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
            'id' => $this->id ?? null,
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
            $data->{'id'} ?? null,
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
