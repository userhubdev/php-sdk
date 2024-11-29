<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Plan group is a collection of related plans.
 *
 * A plan group will generally describe a tier of plans offered
 * (e.g. Basic vs Pro) which might contain multiple billing options
 * (e.g. monthly vs yearly, USD vs EUR).
 */
final class CheckoutPlanGroup implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the plan group.
     */
    public string $id;

    /**
     * The client defined unique identifier of the plan group (e.g. `pro`).
     */
    public ?string $uniqueId;

    /**
     * Whether this is the current plan group for the subscription.
     */
    public ?bool $current;

    /**
     * Whether this is the selected plan group for the checkout.
     */
    public ?bool $selected;

    public function __construct(
        ?string $id = null,
        ?string $uniqueId = null,
        ?bool $current = null,
        ?bool $selected = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->current = $current ?? null;
        $this->selected = $selected ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'current' => $this->current ?? null,
            'selected' => $this->selected ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'uniqueId'} ?? null,
            $data->{'current'} ?? null,
            $data->{'selected'} ?? null,
        );
    }
}
