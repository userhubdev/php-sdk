<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The account balance as of the time the invoice
 * was finalized.
 */
final class InvoiceBalance implements \JsonSerializable, JsonUnserializable
{
    /**
     * The starting balance of the account.
     */
    public ?string $startAmount;

    /**
     * The ending balance of the account.
     */
    public ?string $endAmount;

    /**
     * The amount applied to the invoice from the balance.
     *
     * A negative amount means a debit from the account balance.
     * A positive amount means a credit to the account balance.
     */
    public ?string $appliedAmount;

    public function __construct(
        ?string $startAmount = null,
        ?string $endAmount = null,
        ?string $appliedAmount = null,
    ) {
        $this->startAmount = $startAmount ?? null;
        $this->endAmount = $endAmount ?? null;
        $this->appliedAmount = $appliedAmount ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'startAmount' => $this->startAmount,
            'endAmount' => $this->endAmount,
            'appliedAmount' => $this->appliedAmount,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'startAmount'} ?? null,
            $data->{'endAmount'} ?? null,
            $data->{'appliedAmount'} ?? null,
        );
    }
}
