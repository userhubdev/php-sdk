<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The revision information for the plan.
 */
final class PlanRevision implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the plan revision.
     */
    public string $id;

    /**
     * Whether this is the current revision for the subscription.
     *
     * This is only set in checkout.
     */
    public ?bool $current;

    /**
     * Whether this is the selected revision.
     *
     * This is only set in checkout.
     */
    public ?bool $selected;

    /**
     * Whether this is the latest revision for the plan.
     *
     * This is only set for a current or selected plan in checkout.
     */
    public ?bool $latest;

    /**
     * The tag for the revision.
     *
     * This is only set in checkout for plans selected using a tag.
     */
    public ?string $tag;

    public function __construct(
        ?string $id = null,
        ?bool $current = null,
        ?bool $selected = null,
        ?bool $latest = null,
        ?string $tag = null,
    ) {
        $this->id = $id ?? '';
        $this->current = $current ?? null;
        $this->selected = $selected ?? null;
        $this->latest = $latest ?? null;
        $this->tag = $tag ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'current' => $this->current,
            'selected' => $this->selected,
            'latest' => $this->latest,
            'tag' => $this->tag,
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
            $data->{'tag'} ?? null,
        );
    }
}
