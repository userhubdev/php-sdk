<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Period;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A bill or statement.
 */
final class Invoice implements \JsonSerializable, JsonUnserializable
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
     * The code that best describes the reason for the state.
     */
    public ?string $stateReason;

    /**
     * The time associated with the current state (e.g. paid time).
     */
    public ?\DateTimeInterface $stateTime;

    /**
     * The billing connection.
     */
    public ?Connection $connection;

    /**
     * The external identifier of the invoice.
     */
    public string $externalId;

    /**
     * The invoice number.
     */
    public ?string $number;

    /**
     * The currency code for the invoice (e.g. `USD`).
     */
    public string $currencyCode;

    /**
     * The user facing description for the invoice.
     */
    public ?string $description;

    /**
     * The bill to contact information.
     */
    public ?InvoiceAccount $account;

    /**
     * The time the invoice was finalized.
     */
    public ?\DateTimeInterface $effectiveTime;

    /**
     * The billing period for the invoice.
     */
    public ?Period $period;

    /**
     * The subtotal amount for the invoice.
     *
     * This includes item-level discounts.
     */
    public ?string $subtotalAmount;

    /**
     * The invoice-level discount amount.
     *
     * This does not include item level discounts.
     */
    public ?string $discountAmount;

    /**
     * The starting and ending account balance as
     * of the time the invoice was finalized.
     */
    public ?InvoiceBalance $balance;

    /**
     * The tax amount for the invoice.
     *
     * This is for rendering purposes only and is
     * not the reported tax amount.
     */
    public ?string $taxAmount;

    /**
     * The total amount for the invoice.
     */
    public ?string $totalAmount;

    /**
     * The total amount minus any credits automatically
     * associated with the invoice.
     */
    public ?string $dueAmount;

    /**
     * The due amount minus the amount already paid.
     */
    public ?string $remainingDueAmount;

    /**
     * The time the invoice must be paid by.
     */
    public ?\DateTimeInterface $dueTime;

    /**
     * The amount already paid towards the invoice.
     */
    public ?string $paidAmount;

    /**
     * The status of the invoice payment.
     */
    public ?string $paymentState;

    /**
     * The payment intent for the invoice.
     */
    public ?PaymentIntent $paymentIntent;

    /**
     * The line items for the invoice.
     *
     * @var InvoiceItem[]
     */
    public array $items;

    /**
     * The prorated changes that occurred mid-billing cycle.
     *
     * @var InvoiceChange[]
     */
    public array $changes;

    /**
     * The last time the invoice was pulled from the connection.
     */
    public ?\DateTimeInterface $pullTime;

    /**
     * The creation time of the invoice.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the invoice.
     */
    public \DateTimeInterface $updateTime;

    /**
     * @param null|InvoiceItem[]   $items
     * @param null|InvoiceChange[] $changes
     */
    public function __construct(
        ?string $id = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?\DateTimeInterface $stateTime = null,
        ?Connection $connection = null,
        ?string $externalId = null,
        ?string $number = null,
        ?string $currencyCode = null,
        ?string $description = null,
        ?InvoiceAccount $account = null,
        ?\DateTimeInterface $effectiveTime = null,
        ?Period $period = null,
        ?string $subtotalAmount = null,
        ?string $discountAmount = null,
        ?InvoiceBalance $balance = null,
        ?string $taxAmount = null,
        ?string $totalAmount = null,
        ?string $dueAmount = null,
        ?string $remainingDueAmount = null,
        ?\DateTimeInterface $dueTime = null,
        ?string $paidAmount = null,
        ?string $paymentState = null,
        ?PaymentIntent $paymentIntent = null,
        ?array $items = null,
        ?array $changes = null,
        ?\DateTimeInterface $pullTime = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->stateTime = $stateTime ?? null;
        $this->connection = $connection ?? null;
        $this->externalId = $externalId ?? '';
        $this->number = $number ?? null;
        $this->currencyCode = $currencyCode ?? '';
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
        $this->pullTime = $pullTime ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'stateTime' => Util::encodeDateTime($this->stateTime),
            'connection' => $this->connection,
            'externalId' => $this->externalId,
            'number' => $this->number,
            'currencyCode' => $this->currencyCode,
            'description' => $this->description,
            'account' => $this->account,
            'effectiveTime' => Util::encodeDateTime($this->effectiveTime),
            'period' => $this->period,
            'subtotalAmount' => $this->subtotalAmount,
            'discountAmount' => $this->discountAmount,
            'balance' => $this->balance,
            'taxAmount' => $this->taxAmount,
            'totalAmount' => $this->totalAmount,
            'dueAmount' => $this->dueAmount,
            'remainingDueAmount' => $this->remainingDueAmount,
            'dueTime' => Util::encodeDateTime($this->dueTime),
            'paidAmount' => $this->paidAmount,
            'paymentState' => $this->paymentState,
            'paymentIntent' => $this->paymentIntent,
            'items' => $this->items,
            'changes' => $this->changes,
            'pullTime' => Util::encodeDateTime($this->pullTime),
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            isset($data->{'stateTime'}) ? Util::decodeDateTime($data->{'stateTime'}) : null,
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            $data->{'externalId'} ?? null,
            $data->{'number'} ?? null,
            $data->{'currencyCode'} ?? null,
            $data->{'description'} ?? null,
            isset($data->{'account'}) ? InvoiceAccount::jsonUnserialize($data->{'account'}) : null,
            isset($data->{'effectiveTime'}) ? Util::decodeDateTime($data->{'effectiveTime'}) : null,
            isset($data->{'period'}) ? Period::jsonUnserialize($data->{'period'}) : null,
            $data->{'subtotalAmount'} ?? null,
            $data->{'discountAmount'} ?? null,
            isset($data->{'balance'}) ? InvoiceBalance::jsonUnserialize($data->{'balance'}) : null,
            $data->{'taxAmount'} ?? null,
            $data->{'totalAmount'} ?? null,
            $data->{'dueAmount'} ?? null,
            $data->{'remainingDueAmount'} ?? null,
            isset($data->{'dueTime'}) ? Util::decodeDateTime($data->{'dueTime'}) : null,
            $data->{'paidAmount'} ?? null,
            $data->{'paymentState'} ?? null,
            isset($data->{'paymentIntent'}) ? PaymentIntent::jsonUnserialize($data->{'paymentIntent'}) : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [InvoiceItem::class, 'jsonUnserialize']) : null,
            isset($data->{'changes'}) ? Util::mapArray($data->{'changes'}, [InvoiceChange::class, 'jsonUnserialize']) : null,
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
