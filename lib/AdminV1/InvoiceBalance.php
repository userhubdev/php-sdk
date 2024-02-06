<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The account balance as of the time the invoice
 * was finalized.
 */
class InvoiceBalance implements \JsonSerializable, JsonUnserializable
{
    /**
     * The starting balance of the account.
     */
    public null|string $startAmount;

    /**
     * The ending balance of the account.
     */
    public null|string $endAmount;

    /**
     * The amount applied to the invoice from the balance.
     *
     * A negative amount means a debit from the account balance.
     * A positive amount means a credit to the account balance.
     */
    public null|string $appliedAmount;

    public function __construct(
        null|string $startAmount = null,
        null|string $endAmount = null,
        null|string $appliedAmount = null,
    ) {
        $this->startAmount = $startAmount ?? null;
        $this->endAmount = $endAmount ?? null;
        $this->appliedAmount = $appliedAmount ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'startAmount' => isset($this->startAmount) ? $this->startAmount : null,
            'endAmount' => isset($this->endAmount) ? $this->endAmount : null,
            'appliedAmount' => isset($this->appliedAmount) ? $this->appliedAmount : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new InvoiceBalance(
            isset($data->{'startAmount'}) ? $data->{'startAmount'} : null,
            isset($data->{'endAmount'}) ? $data->{'endAmount'} : null,
            isset($data->{'appliedAmount'}) ? $data->{'appliedAmount'} : null,
        );
    }
}
