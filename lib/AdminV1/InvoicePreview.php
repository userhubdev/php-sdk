<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A preview of an invoice.
 */
class InvoicePreview implements \JsonSerializable, JsonUnserializable
{
    /**
     * The currency code for the preview (e.g. `USD`).
     */
    public null|string $currencyCode;

    /**
     * The bill to contact information.
     */
    public null|\UserHub\AdminV1\InvoiceAccount $account;

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
     * The subtotal amount for the preview.
     *
     * This includes item-level discounts.
     */
    public null|string $subtotalAmount;

    /**
     * The preview-level discount amount.
     *
     * This does not include item level discounts.
     */
    public null|string $discountAmount;

    /**
     * The starting and ending account balance as
     * of the time the preview.
     */
    public null|\UserHub\AdminV1\InvoiceBalance $balance;

    /**
     * The tax amount for the preview.
     */
    public null|string $taxAmount;

    /**
     * The total amount for the preview.
     */
    public null|string $totalAmount;

    /**
     * The total amount minus any credits automatically
     * associated with the preview.
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
     * @var \UserHub\AdminV1\InvoicePreviewItem[]
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
        $this->currencyCode = $currencyCode ?? null;
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
            'currencyCode' => isset($this->currencyCode) ? $this->currencyCode : null,
            'account' => isset($this->account) ? $this->account : null,
            'effectiveTime' => isset($this->effectiveTime) ? Util::encodeDateTime($this->effectiveTime) : null,
            'subtotalAmount' => isset($this->subtotalAmount) ? $this->subtotalAmount : null,
            'discountAmount' => isset($this->discountAmount) ? $this->discountAmount : null,
            'balance' => isset($this->balance) ? $this->balance : null,
            'taxAmount' => isset($this->taxAmount) ? $this->taxAmount : null,
            'totalAmount' => isset($this->totalAmount) ? $this->totalAmount : null,
            'dueAmount' => isset($this->dueAmount) ? $this->dueAmount : null,
            'changeToken' => isset($this->changeToken) ? $this->changeToken : null,
            'items' => isset($this->items) ? $this->items : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new InvoicePreview(
            isset($data->{'currencyCode'}) ? $data->{'currencyCode'} : null,
            isset($data->{'account'}) ? InvoiceAccount::jsonUnserialize($data->{'account'}) : null,
            isset($data->{'effectiveTime'}) ? Util::decodeDateTime($data->{'effectiveTime'}) : null,
            isset($data->{'subtotalAmount'}) ? $data->{'subtotalAmount'} : null,
            isset($data->{'discountAmount'}) ? $data->{'discountAmount'} : null,
            isset($data->{'balance'}) ? InvoiceBalance::jsonUnserialize($data->{'balance'}) : null,
            isset($data->{'taxAmount'}) ? $data->{'taxAmount'} : null,
            isset($data->{'totalAmount'}) ? $data->{'totalAmount'} : null,
            isset($data->{'dueAmount'}) ? $data->{'dueAmount'} : null,
            isset($data->{'changeToken'}) ? $data->{'changeToken'} : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [InvoicePreviewItem::class, 'jsonUnserialize']) : null,
        );
    }
}
