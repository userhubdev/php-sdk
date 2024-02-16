<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\CommonV1\Period;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A bill or statement.
 */
class Invoice implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the invoice.
     */
    public string $id;

    /**
     * The status of the invoice.
     */
    public string $state;

    /**
     * The time associated with the current state (e.g. paid time).
     */
    public null|\DateTimeInterface $stateTime;

    /**
     * The invoice number.
     */
    public null|string $number;

    /**
     * The currency code for the invoice (e.g. `USD`).
     */
    public null|string $currencyCode;

    /**
     * The user facing description for the invoice.
     */
    public null|string $description;

    /**
     * The contact information associated with the invoice.
     */
    public null|\UserHub\UserV1\InvoiceAccount $account;

    /**
     * The time the invoice was finalized.
     */
    public null|\DateTimeInterface $effectiveTime;

    /**
     * The billing period for the invoice.
     */
    public null|\UserHub\CommonV1\Period $period;

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
    public null|\UserHub\UserV1\InvoiceBalance $balance;

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
     * The due amount minus the amount already paid.
     */
    public null|string $remainingDueAmount;

    /**
     * The time the invoice must be paid by.
     */
    public null|\DateTimeInterface $dueTime;

    /**
     * The amount already paid towards the invoice.
     */
    public null|string $paidAmount;

    /**
     * The status of the invoice payment.
     */
    public null|string $paymentState;

    /**
     * The payment intent for the invoice.
     */
    public null|\UserHub\UserV1\PaymentIntent $paymentIntent;

    /**
     * The line items for the invoice.
     *
     * @var \UserHub\UserV1\InvoiceItem[]
     */
    public array $items;

    /**
     * The prorated changes that occurred mid-billing cycle.
     *
     * @var \UserHub\UserV1\InvoiceChange[]
     */
    public array $changes;

    /**
     * The creation time of the invoice.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the invoice.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|string $id = null,
        null|string $state = null,
        null|\DateTimeInterface $stateTime = null,
        null|string $number = null,
        null|string $currencyCode = null,
        null|string $description = null,
        null|InvoiceAccount $account = null,
        null|\DateTimeInterface $effectiveTime = null,
        null|Period $period = null,
        null|string $subtotalAmount = null,
        null|string $discountAmount = null,
        null|InvoiceBalance $balance = null,
        null|string $taxAmount = null,
        null|string $totalAmount = null,
        null|string $dueAmount = null,
        null|string $remainingDueAmount = null,
        null|\DateTimeInterface $dueTime = null,
        null|string $paidAmount = null,
        null|string $paymentState = null,
        null|PaymentIntent $paymentIntent = null,
        null|array $items = null,
        null|array $changes = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->stateTime = $stateTime ?? null;
        $this->number = $number ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->description = $description ?? null;
        $this->account = $account ?? null;
        $this->effectiveTime = $effectiveTime ?? null;
        $this->period = $period ?? null;
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->balance = $balance ?? null;
        $this->taxAmount = $taxAmount ?? null;
        $this->totalAmount = $totalAmount ?? null;
        $this->dueAmount = $dueAmount ?? null;
        $this->remainingDueAmount = $remainingDueAmount ?? null;
        $this->dueTime = $dueTime ?? null;
        $this->paidAmount = $paidAmount ?? null;
        $this->paymentState = $paymentState ?? null;
        $this->paymentIntent = $paymentIntent ?? null;
        $this->items = $items ?? [];
        $this->changes = $changes ?? [];
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'state' => isset($this->state) ? $this->state : null,
            'stateTime' => isset($this->stateTime) ? Util::encodeDateTime($this->stateTime) : null,
            'number' => isset($this->number) ? $this->number : null,
            'currencyCode' => isset($this->currencyCode) ? $this->currencyCode : null,
            'description' => isset($this->description) ? $this->description : null,
            'account' => isset($this->account) ? $this->account : null,
            'effectiveTime' => isset($this->effectiveTime) ? Util::encodeDateTime($this->effectiveTime) : null,
            'period' => isset($this->period) ? $this->period : null,
            'subtotalAmount' => isset($this->subtotalAmount) ? $this->subtotalAmount : null,
            'discountAmount' => isset($this->discountAmount) ? $this->discountAmount : null,
            'balance' => isset($this->balance) ? $this->balance : null,
            'taxAmount' => isset($this->taxAmount) ? $this->taxAmount : null,
            'totalAmount' => isset($this->totalAmount) ? $this->totalAmount : null,
            'dueAmount' => isset($this->dueAmount) ? $this->dueAmount : null,
            'remainingDueAmount' => isset($this->remainingDueAmount) ? $this->remainingDueAmount : null,
            'dueTime' => isset($this->dueTime) ? Util::encodeDateTime($this->dueTime) : null,
            'paidAmount' => isset($this->paidAmount) ? $this->paidAmount : null,
            'paymentState' => isset($this->paymentState) ? $this->paymentState : null,
            'paymentIntent' => isset($this->paymentIntent) ? $this->paymentIntent : null,
            'items' => isset($this->items) ? $this->items : null,
            'changes' => isset($this->changes) ? $this->changes : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Invoice(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'stateTime'}) ? Util::decodeDateTime($data->{'stateTime'}) : null,
            isset($data->{'number'}) ? $data->{'number'} : null,
            isset($data->{'currencyCode'}) ? $data->{'currencyCode'} : null,
            isset($data->{'description'}) ? $data->{'description'} : null,
            isset($data->{'account'}) ? InvoiceAccount::jsonUnserialize($data->{'account'}) : null,
            isset($data->{'effectiveTime'}) ? Util::decodeDateTime($data->{'effectiveTime'}) : null,
            isset($data->{'period'}) ? Period::jsonUnserialize($data->{'period'}) : null,
            isset($data->{'subtotalAmount'}) ? $data->{'subtotalAmount'} : null,
            isset($data->{'discountAmount'}) ? $data->{'discountAmount'} : null,
            isset($data->{'balance'}) ? InvoiceBalance::jsonUnserialize($data->{'balance'}) : null,
            isset($data->{'taxAmount'}) ? $data->{'taxAmount'} : null,
            isset($data->{'totalAmount'}) ? $data->{'totalAmount'} : null,
            isset($data->{'dueAmount'}) ? $data->{'dueAmount'} : null,
            isset($data->{'remainingDueAmount'}) ? $data->{'remainingDueAmount'} : null,
            isset($data->{'dueTime'}) ? Util::decodeDateTime($data->{'dueTime'}) : null,
            isset($data->{'paidAmount'}) ? $data->{'paidAmount'} : null,
            isset($data->{'paymentState'}) ? $data->{'paymentState'} : null,
            isset($data->{'paymentIntent'}) ? PaymentIntent::jsonUnserialize($data->{'paymentIntent'}) : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [InvoiceItem::class, 'jsonUnserialize']) : null,
            isset($data->{'changes'}) ? Util::mapArray($data->{'changes'}, [InvoiceChange::class, 'jsonUnserialize']) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
