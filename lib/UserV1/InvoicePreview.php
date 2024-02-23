<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A preview of an invoice.
 */
class InvoicePreview implements \JsonSerializable, JsonUnserializable
{
    /**
     * The currency code for the invoice (e.g. `USD`).
     */
    public string $currencyCode;

    /**
     * The contact information associated with the invoice.
     */
    public null|InvoiceAccount $account;

    /**
     * The time the upcoming invoice will be finalized.
     *
     * This is an estimate and might not exactly match the finalized
     * invoice.
     *
     * This will be null if the preview would be applied
     * immediately.
     */
    public null|\DateTimeInterface $effectiveTime;

    /**
     * The subtotal amount for the invoice.
     *
     * This includes item-level discounts.
     */
    public null|string $subtotalAmount;

    /**
     * The invoice-level discount amount.
     *
     * This does not include item level discounts.
     */
    public null|string $discountAmount;

    /**
     * The starting and ending account balance as
     * of the time the invoice was finalized.
     */
    public null|InvoiceBalance $balance;

    /**
     * The tax amount for the invoice.
     *
     * This is for rendering purposes only and is
     * not the reported tax amount.
     */
    public null|string $taxAmount;

    /**
     * The total amount for the invoice.
     */
    public null|string $totalAmount;

    /**
     * The total amount minus any credits automatically
     * associated with the invoice.
     */
    public null|string $dueAmount;

    /**
     * A token which can be passed to a create or update
     * operation to ensure the change matches the preview.
     *
     * This token generally expires within 10 minutes of
     * being generated.
     */
    public null|string $changeToken;

    /**
     * The line items for the invoice.
     *
     * @var \UserHub\UserV1\InvoicePreviewItem[]
     */
    public array $items;

    public function __construct(
        null|string $currencyCode = null,
        null|InvoiceAccount $account = null,
        null|\DateTimeInterface $effectiveTime = null,
        null|string $subtotalAmount = null,
        null|string $discountAmount = null,
        null|InvoiceBalance $balance = null,
        null|string $taxAmount = null,
        null|string $totalAmount = null,
        null|string $dueAmount = null,
        null|string $changeToken = null,
        null|array $items = null,
    ) {
        $this->currencyCode = $currencyCode ?? '';
        $this->account = $account ?? null;
        $this->effectiveTime = $effectiveTime ?? null;
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->balance = $balance ?? null;
        $this->taxAmount = $taxAmount ?? null;
        $this->totalAmount = $totalAmount ?? null;
        $this->dueAmount = $dueAmount ?? null;
        $this->changeToken = $changeToken ?? null;
        $this->items = $items ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'currencyCode' => $this->currencyCode ?? null,
            'account' => $this->account ?? null,
            'effectiveTime' => isset($this->effectiveTime) ? Util::encodeDateTime($this->effectiveTime) : null,
            'subtotalAmount' => $this->subtotalAmount ?? null,
            'discountAmount' => $this->discountAmount ?? null,
            'balance' => $this->balance ?? null,
            'taxAmount' => $this->taxAmount ?? null,
            'totalAmount' => $this->totalAmount ?? null,
            'dueAmount' => $this->dueAmount ?? null,
            'changeToken' => $this->changeToken ?? null,
            'items' => $this->items ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'currencyCode'} ?? null,
            isset($data->{'account'}) ? InvoiceAccount::jsonUnserialize($data->{'account'}) : null,
            isset($data->{'effectiveTime'}) ? Util::decodeDateTime($data->{'effectiveTime'}) : null,
            $data->{'subtotalAmount'} ?? null,
            $data->{'discountAmount'} ?? null,
            isset($data->{'balance'}) ? InvoiceBalance::jsonUnserialize($data->{'balance'}) : null,
            $data->{'taxAmount'} ?? null,
            $data->{'totalAmount'} ?? null,
            $data->{'dueAmount'} ?? null,
            $data->{'changeToken'} ?? null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [InvoicePreviewItem::class, 'jsonUnserialize']) : null,
        );
    }
}
