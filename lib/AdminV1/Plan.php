<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Interval;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The plan.
 */
final class Plan implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the plan.
     */
    public string $id;

    /**
     * The name of the plan.
     */
    public string $displayName;

    /**
     * The description of the plan.
     */
    public null|string $description;

    /**
     * The currency code for the plan (e.g. `USD`).
     */
    public string $currencyCode;

    /**
     * The billing interval for the plan.
     */
    public null|Interval $billingInterval;

    /**
     * The tags associated with the revision.
     *
     * @var string[]
     */
    public array $tags;

    /**
     * The items associated with plan.
     *
     * @var \UserHub\AdminV1\PlanItem[]
     */
    public array $items;

    /**
     * @param null|string[]                    $tags
     * @param null|\UserHub\AdminV1\PlanItem[] $items
     */
    public function __construct(
        null|string $id = null,
        null|string $displayName = null,
        null|string $description = null,
        null|string $currencyCode = null,
        null|Interval $billingInterval = null,
        null|array $tags = null,
        null|array $items = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? '';
        $this->description = $description ?? null;
        $this->currencyCode = $currencyCode ?? '';
        $this->billingInterval = $billingInterval ?? new Interval();
        $this->tags = $tags ?? [];
        $this->items = $items ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'displayName' => $this->displayName ?? null,
            'description' => $this->description ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'billingInterval' => $this->billingInterval ?? null,
            'tags' => $this->tags ?? null,
            'items' => $this->items ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'description'} ?? null,
            $data->{'currencyCode'} ?? null,
            isset($data->{'billingInterval'}) ? Interval::jsonUnserialize($data->{'billingInterval'}) : null,
            $data->{'tags'} ?? null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [PlanItem::class, 'jsonUnserialize']) : null,
        );
    }
}
