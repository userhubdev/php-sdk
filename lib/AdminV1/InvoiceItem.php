<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Period;
use UserHub\Internal\JsonUnserializable;

/**
 * The line items for the invoice.
 */
final class InvoiceItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the item.
     */
    public string $id;

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
     * The external identifier of the invoice item.
     */
    public ?string $externalId;

    /**
     * Whether the item was a proration.
     */
    public ?bool $proration;

    /**
     * The billing period for the item.
     */
    public ?Period $period;

    public function __construct(
        ?string $id = null,
        ?Product $product = null,
        ?Price $price = null,
        ?int $quantity = null,
        ?string $subtotalAmount = null,
        ?string $discountAmount = null,
        ?string $description = null,
        ?string $externalId = null,
        ?bool $proration = null,
        ?Period $period = null,
    ) {
        $this->id = $id ?? '';
        $this->product = $product ?? null;
        $this->price = $price ?? null;
        $this->quantity = $quantity ?? null;
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->description = $description ?? null;
        $this->externalId = $externalId ?? null;
        $this->proration = $proration ?? null;
        $this->period = $period ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'product' => $this->product,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'subtotalAmount' => $this->subtotalAmount,
            'discountAmount' => $this->discountAmount,
            'description' => $this->description,
            'externalId' => $this->externalId,
            'proration' => $this->proration,
            'period' => $this->period,
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
            $data->{'externalId'} ?? null,
            $data->{'proration'} ?? null,
            isset($data->{'period'}) ? Period::jsonUnserialize($data->{'period'}) : null,
        );
    }
}
