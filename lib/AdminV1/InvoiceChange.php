<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A prorated change that occurred mid-billing cycle.
 */
class InvoiceChange implements \JsonSerializable, JsonUnserializable
{
    /**
     * The time the change occurred.
     */
    public null|\DateTimeInterface $time;

    /**
     * The user-facing description for the change.
     */
    public null|string $description;

    /**
     * The total amount for the change excluding
     * taxes and discounts.
     */
    public null|string $subtotalAmount;

    /**
     * The change discount amount.
     */
    public null|string $discountAmount;

    /**
     * The starting quantity of the change.
     */
    public null|int $startQuantity;

    /**
     * The ending quantity of the change.
     */
    public null|int $endQuantity;

    /**
     * The starting (credited) item identifiers.
     *
     * @var string[]
     */
    public array $startItemIds;

    /**
     * The ending (charged) item identifiers.
     *
     * @var string[]
     */
    public array $endItemIds;

    public function __construct(
        null|\DateTimeInterface $time = null,
        null|string $description = null,
        null|string $subtotalAmount = null,
        null|string $discountAmount = null,
        null|int $startQuantity = null,
        null|int $endQuantity = null,
        null|array $startItemIds = null,
        null|array $endItemIds = null,
    ) {
        $this->time = $time ?? null;
        $this->description = $description ?? null;
        $this->subtotalAmount = $subtotalAmount ?? null;
        $this->discountAmount = $discountAmount ?? null;
        $this->startQuantity = $startQuantity ?? null;
        $this->endQuantity = $endQuantity ?? null;
        $this->startItemIds = $startItemIds ?? [];
        $this->endItemIds = $endItemIds ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'time' => isset($this->time) ? Util::encodeDateTime($this->time) : null,
            'description' => isset($this->description) ? $this->description : null,
            'subtotalAmount' => isset($this->subtotalAmount) ? $this->subtotalAmount : null,
            'discountAmount' => isset($this->discountAmount) ? $this->discountAmount : null,
            'startQuantity' => isset($this->startQuantity) ? $this->startQuantity : null,
            'endQuantity' => isset($this->endQuantity) ? $this->endQuantity : null,
            'startItemIds' => isset($this->startItemIds) ? $this->startItemIds : null,
            'endItemIds' => isset($this->endItemIds) ? $this->endItemIds : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new InvoiceChange(
            isset($data->{'time'}) ? Util::decodeDateTime($data->{'time'}) : null,
            isset($data->{'description'}) ? $data->{'description'} : null,
            isset($data->{'subtotalAmount'}) ? $data->{'subtotalAmount'} : null,
            isset($data->{'discountAmount'}) ? $data->{'discountAmount'} : null,
            isset($data->{'startQuantity'}) ? $data->{'startQuantity'} : null,
            isset($data->{'endQuantity'}) ? $data->{'endQuantity'} : null,
            isset($data->{'startItemIds'}) ? $data->{'startItemIds'} : null,
            isset($data->{'endItemIds'}) ? $data->{'endItemIds'} : null,
        );
    }
}
