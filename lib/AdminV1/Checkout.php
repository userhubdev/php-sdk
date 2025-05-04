<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\ApiV1\Status;
use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The checkout.
 */
final class Checkout implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the checkout.
     */
    public string $id;

    /**
     * The type of checkout.
     */
    public string $type;

    /**
     * The state of the checkout.
     */
    public string $state;

    /**
     * The checkout error.
     */
    public ?Status $error;

    /**
     * The currently selected currency code.
     */
    public string $currencyCode;

    /**
     * The plans available for checkout.
     *
     * @var Plan[]
     */
    public array $plans;

    /**
     * The payment method for the checkout.
     */
    public ?PaymentMethod $paymentMethod;

    /**
     * The company or individual's full name.
     */
    public ?string $fullName;

    /**
     * The billing address.
     */
    public ?Address $address;

    /**
     * The steps required to complete the checkout.
     *
     * @var CheckoutStep[]
     */
    public array $steps;

    /**
     * The products included in the checkout.
     *
     * @var CheckoutItem[]
     */
    public array $items;

    /**
     * The discounts applied to the checkout.
     *
     * @var CheckoutDiscount[]
     */
    public array $discounts;

    /**
     * The subtotal amount for the checkout.
     *
     * This includes item-level discounts.
     */
    public ?string $subtotalAmount;

    /**
     * The top-level discount amount.
     *
     * This does not include item level discounts.
     */
    public ?string $discountAmount;

    /**
     * The tax amount for the checkout.
     *
     * This is for rendering purposes only and is
     * not the reported tax amount.
     */
    public ?string $taxAmount;

    /**
     * The total amount for the checkout.
     */
    public ?string $totalAmount;

    /**
     * The amount applied to the checkout from the balance.
     *
     * A negative amount means a debit from the account balance.
     * A positive amount means a credit to the account balance.
     */
    public ?string $balanceAppliedAmount;

    /**
     * The total amount minus any credits automatically
     * associated with the invoice.
     */
    public ?string $dueAmount;

    /**
     * The normal total recurring amount.
     *
     * This does not include any time-limited discounts.
     */
    public ?string $renewAmount;

    /**
     * @param null|Plan[]             $plans
     * @param null|CheckoutStep[]     $steps
     * @param null|CheckoutItem[]     $items
     * @param null|CheckoutDiscount[] $discounts
     */
    public function __construct(
        ?string $id = null,
        ?string $type = null,
        ?string $state = null,
        ?Status $error = null,
        ?string $currencyCode = null,
        ?array $plans = null,
        ?PaymentMethod $paymentMethod = null,
        ?string $fullName = null,
        ?Address $address = null,
        ?array $steps = null,
        ?array $items = null,
        ?array $discounts = null,
        ?string $subtotalAmount = null,
        ?string $discountAmount = null,
        ?string $taxAmount = null,
        ?string $totalAmount = null,
        ?string $balanceAppliedAmount = null,
        ?string $dueAmount = null,
        ?string $renewAmount = null,
    ) {
        $this->id = $id ?? '';
        $this->type = $type ?? '';
        $this->state = $state ?? '';
        $this->error = $error ?? null;
        $this->currencyCode = $currencyCode ?? '';
        $this->plans = $plans ?? [];
        $this->paymentMethod = $paymentMethod ?? null;
        $this->fullName = $fullName ?? null;
        $this->address = $address ?? null;
        $this->steps = $steps ?? [];
        $this->items = $items ?? [];
        $this->discounts = $discounts ?? [];
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->taxAmount = $taxAmount ?? null;
        $this->totalAmount = $totalAmount ?? null;
        $this->balanceAppliedAmount = $balanceAppliedAmount ?? null;
        $this->dueAmount = $dueAmount ?? null;
        $this->renewAmount = $renewAmount ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'type' => $this->type,
            'state' => $this->state,
            'error' => $this->error,
            'currencyCode' => $this->currencyCode,
            'plans' => $this->plans,
            'paymentMethod' => $this->paymentMethod,
            'fullName' => $this->fullName,
            'address' => $this->address,
            'steps' => $this->steps,
            'items' => $this->items,
            'discounts' => $this->discounts,
            'subtotalAmount' => $this->subtotalAmount,
            'discountAmount' => $this->discountAmount,
            'taxAmount' => $this->taxAmount,
            'totalAmount' => $this->totalAmount,
            'balanceAppliedAmount' => $this->balanceAppliedAmount,
            'dueAmount' => $this->dueAmount,
            'renewAmount' => $this->renewAmount,
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
            $data->{'state'} ?? null,
            isset($data->{'error'}) ? Status::jsonUnserialize($data->{'error'}) : null,
            $data->{'currencyCode'} ?? null,
            isset($data->{'plans'}) ? Util::mapArray($data->{'plans'}, [Plan::class, 'jsonUnserialize']) : null,
            isset($data->{'paymentMethod'}) ? PaymentMethod::jsonUnserialize($data->{'paymentMethod'}) : null,
            $data->{'fullName'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            isset($data->{'steps'}) ? Util::mapArray($data->{'steps'}, [CheckoutStep::class, 'jsonUnserialize']) : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [CheckoutItem::class, 'jsonUnserialize']) : null,
            isset($data->{'discounts'}) ? Util::mapArray($data->{'discounts'}, [CheckoutDiscount::class, 'jsonUnserialize']) : null,
            $data->{'subtotalAmount'} ?? null,
            $data->{'discountAmount'} ?? null,
            $data->{'taxAmount'} ?? null,
            $data->{'totalAmount'} ?? null,
            $data->{'balanceAppliedAmount'} ?? null,
            $data->{'dueAmount'} ?? null,
            $data->{'renewAmount'} ?? null,
        );
    }
}
