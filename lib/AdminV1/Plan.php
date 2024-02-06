<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\CommonV1\Interval;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The plan.
 */
class Plan implements \JsonSerializable, JsonUnserializable
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
    public null|string $currencyCode;

    /**
     * The billing interval for the plan.
     */
    public null|\UserHub\CommonV1\Interval $billingInterval;

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
        $this->currencyCode = $currencyCode ?? null;
        $this->billingInterval = $billingInterval ?? null;
        $this->tags = $tags ?? [];
        $this->items = $items ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'description' => isset($this->description) ? $this->description : null,
            'currencyCode' => isset($this->currencyCode) ? $this->currencyCode : null,
            'billingInterval' => isset($this->billingInterval) ? $this->billingInterval : null,
            'tags' => isset($this->tags) ? $this->tags : null,
            'items' => isset($this->items) ? $this->items : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Plan(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'description'}) ? $data->{'description'} : null,
            isset($data->{'currencyCode'}) ? $data->{'currencyCode'} : null,
            isset($data->{'billingInterval'}) ? Interval::jsonUnserialize($data->{'billingInterval'}) : null,
            isset($data->{'tags'}) ? $data->{'tags'} : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [PlanItem::class, 'jsonUnserialize']) : null,
        );
    }
}
