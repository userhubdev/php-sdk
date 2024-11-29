<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Revision is a collection of plans with the same revision.
 *
 * This will group plans with different billing cycles.
 */
final class CheckoutPlanRevision implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the plan group revision.
     */
    public string $id;

    /**
     * Whether this is the current revision for the subscription.
     */
    public ?bool $current;

    /**
     * Whether this is the selected revision for the checkout.
     */
    public ?bool $selected;

    /**
     * Whether this is the latest revision for the plan group.
     *
     * This will only be set for a current or selected plan group.
     */
    public ?bool $latest;

    public function __construct(
        ?string $id = null,
        ?bool $current = null,
        ?bool $selected = null,
        ?bool $latest = null,
    ) {
        $this->id = $id ?? '';
        $this->current = $current ?? null;
        $this->selected = $selected ?? null;
        $this->latest = $latest ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'current' => $this->current ?? null,
            'selected' => $this->selected ?? null,
            'latest' => $this->latest ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'current'} ?? null,
            $data->{'selected'} ?? null,
            $data->{'latest'} ?? null,
        );
    }
}
