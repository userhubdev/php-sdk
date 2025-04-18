<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A prorated change that occurred mid-billing cycle.
 */
final class InvoiceChange implements \JsonSerializable, JsonUnserializable
{
    /**
     * The time the change occurred.
     */
    public \DateTimeInterface $time;

    /**
     * The user-facing description for the change.
     */
    public string $description;

    /**
     * The total amount for the change excluding
     * taxes and discounts.
     */
    public string $subtotalAmount;

    /**
     * The change discount amount.
     */
    public ?string $discountAmount;

    /**
     * The starting quantity of the change.
     */
    public int $startQuantity;

    /**
     * The ending quantity of the change.
     */
    public int $endQuantity;

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

    /**
     * @param null|string[] $startItemIds
     * @param null|string[] $endItemIds
     */
    public function __construct(
        ?\DateTimeInterface $time = null,
        ?string $description = null,
        ?string $subtotalAmount = null,
        ?string $discountAmount = null,
        ?int $startQuantity = null,
        ?int $endQuantity = null,
        ?array $startItemIds = null,
        ?array $endItemIds = null,
    ) {
        $this->time = $time ?? Util::emptyDateTime();
        $this->description = $description ?? '';
        $this->subtotalAmount = $subtotalAmount ?? '';
        $this->discountAmount = $discountAmount ?? null;
        $this->startQuantity = $startQuantity ?? 0;
        $this->endQuantity = $endQuantity ?? 0;
        $this->startItemIds = $startItemIds ?? [];
        $this->endItemIds = $endItemIds ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'time' => Util::encodeDateTime($this->time),
            'description' => $this->description,
            'subtotalAmount' => $this->subtotalAmount,
            'discountAmount' => $this->discountAmount,
            'startQuantity' => $this->startQuantity,
            'endQuantity' => $this->endQuantity,
            'startItemIds' => $this->startItemIds,
            'endItemIds' => $this->endItemIds,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'time'}) ? Util::decodeDateTime($data->{'time'}) : null,
            $data->{'description'} ?? null,
            $data->{'subtotalAmount'} ?? null,
            $data->{'discountAmount'} ?? null,
            $data->{'startQuantity'} ?? null,
            $data->{'endQuantity'} ?? null,
            $data->{'startItemIds'} ?? null,
            $data->{'endItemIds'} ?? null,
        );
    }
}
