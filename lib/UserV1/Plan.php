<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

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
     * The status of the plan.
     */
    public string $state;

    /**
     * The client defined unique identifier of the plan.
     */
    public ?string $uniqueId;

    /**
     * The name of the plan.
     */
    public string $displayName;

    /**
     * The description of the plan.
     */
    public ?string $description;

    /**
     * The tier for the plan.
     *
     * This is only available in checkout and pricing.
     */
    public ?string $tier;

    /**
     * The currency code for the plan (e.g. `USD`).
     */
    public ?string $currencyCode;

    /**
     * The billing interval for the plan.
     */
    public ?Interval $interval;

    /**
     * The revision for the plan.
     */
    public ?PlanRevision $revision;

    /**
     * Whether this is the current plan for the subscription.
     *
     * This is only set in checkout.
     */
    public ?bool $current;

    /**
     * Whether this is the selected plan.
     *
     * This is only set in checkout.
     */
    public ?bool $selected;

    /**
     * Whether this is the default term for the plan.
     */
    public ?bool $default;

    /**
     * The trial settings.
     *
     * For authenticated requests, this will only be set for accounts that
     * are eligible for a new trial.
     */
    public ?PlanTrial $trial;

    /**
     * Whether the change is considered an upgrade or
     * a downgrade.
     *
     * This is only set in checkout.
     */
    public ?string $changePath;

    /**
     * The savings for the plan.
     *
     * The savings are in comparison to the plan in the revision with the
     * shortest billing interval (normally monthly).
     */
    public ?PlanSavings $savings;

    /**
     * The items associated with plan.
     *
     * @var PlanItem[]
     */
    public array $items;

    /**
     * @param null|PlanItem[] $items
     */
    public function __construct(
        ?string $id = null,
        ?string $state = null,
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $description = null,
        ?string $tier = null,
        ?string $currencyCode = null,
        ?Interval $interval = null,
        ?PlanRevision $revision = null,
        ?bool $current = null,
        ?bool $selected = null,
        ?bool $default = null,
        ?PlanTrial $trial = null,
        ?string $changePath = null,
        ?PlanSavings $savings = null,
        ?array $items = null,
    ) {
        $this->id = $id ?? '';
        $this->state = $state ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
        $this->description = $description ?? null;
        $this->tier = $tier ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->interval = $interval ?? null;
        $this->revision = $revision ?? null;
        $this->current = $current ?? null;
        $this->selected = $selected ?? null;
        $this->default = $default ?? null;
        $this->trial = $trial ?? null;
        $this->changePath = $changePath ?? null;
        $this->savings = $savings ?? null;
        $this->items = $items ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'state' => $this->state,
            'uniqueId' => $this->uniqueId,
            'displayName' => $this->displayName,
            'description' => $this->description,
            'tier' => $this->tier,
            'currencyCode' => $this->currencyCode,
            'interval' => $this->interval,
            'revision' => $this->revision,
            'current' => $this->current,
            'selected' => $this->selected,
            'default' => $this->default,
            'trial' => $this->trial,
            'changePath' => $this->changePath,
            'savings' => $this->savings,
            'items' => $this->items,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'state'} ?? null,
            $data->{'uniqueId'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'description'} ?? null,
            $data->{'tier'} ?? null,
            $data->{'currencyCode'} ?? null,
            isset($data->{'interval'}) ? Interval::jsonUnserialize($data->{'interval'}) : null,
            isset($data->{'revision'}) ? PlanRevision::jsonUnserialize($data->{'revision'}) : null,
            $data->{'current'} ?? null,
            $data->{'selected'} ?? null,
            $data->{'default'} ?? null,
            isset($data->{'trial'}) ? PlanTrial::jsonUnserialize($data->{'trial'}) : null,
            $data->{'changePath'} ?? null,
            isset($data->{'savings'}) ? PlanSavings::jsonUnserialize($data->{'savings'}) : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [PlanItem::class, 'jsonUnserialize']) : null,
        );
    }
}
