<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\CommonV1\Interval;
use UserHub\Internal\JsonUnserializable;

/**
 * The plan.
 */
final class CheckoutPlan implements \JsonSerializable, JsonUnserializable
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
    public ?string $description;

    /**
     * The billing interval for the plan.
     */
    public ?Interval $billingInterval;

    /**
     * The plan group for the plan.
     */
    public ?CheckoutPlanGroup $group;

    /**
     * The revision for the plan.
     */
    public ?CheckoutPlanRevision $revision;

    /**
     * Whether this is the current plan for the subscription.
     */
    public ?bool $current;

    /**
     * Whether this is the selected plan for the checkout.
     */
    public ?bool $selected;

    /**
     * Whether this is the default plan for the plan group.
     */
    public ?bool $default;

    /**
     * The trial settings.
     *
     * For authenticated requests, this will not be set when the account
     * isn't eligible for a trial.
     */
    public ?CheckoutPlanTrial $trial;

    /**
     * Whether the change is considered an upgrade or
     * a downgrade.
     */
    public ?string $changePath;

    /**
     * The flat price for the plan.
     *
     * This might not exists for plans that are billed by seat.
     */
    public ?Price $price;

    /**
     * The primary seat price for the plan.
     */
    public ?Price $seatPrice;

    /**
     * The savings for the plan.
     *
     * The savings are in comparison to the plan in the revision with the
     * shortest billing interval.
     */
    public ?CheckoutPlanSavings $savings;

    /**
     * Whether this plan is disabled for checkout.
     *
     * This will only be set when the current/selected plan is disabled, all
     * other plans will be available for checkout.
     */
    public ?bool $disabled;

    public function __construct(
        ?string $id = null,
        ?string $displayName = null,
        ?string $description = null,
        ?Interval $billingInterval = null,
        ?CheckoutPlanGroup $group = null,
        ?CheckoutPlanRevision $revision = null,
        ?bool $current = null,
        ?bool $selected = null,
        ?bool $default = null,
        ?CheckoutPlanTrial $trial = null,
        ?string $changePath = null,
        ?Price $price = null,
        ?Price $seatPrice = null,
        ?CheckoutPlanSavings $savings = null,
        ?bool $disabled = null,
    ) {
        $this->id = $id ?? '';
        $this->displayName = $displayName ?? '';
        $this->description = $description ?? null;
        $this->billingInterval = $billingInterval ?? new Interval();
        $this->group = $group ?? new CheckoutPlanGroup();
        $this->revision = $revision ?? new CheckoutPlanRevision();
        $this->current = $current ?? null;
        $this->selected = $selected ?? null;
        $this->default = $default ?? null;
        $this->trial = $trial ?? null;
        $this->changePath = $changePath ?? null;
        $this->price = $price ?? null;
        $this->seatPrice = $seatPrice ?? null;
        $this->savings = $savings ?? null;
        $this->disabled = $disabled ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'displayName' => $this->displayName ?? null,
            'description' => $this->description ?? null,
            'billingInterval' => $this->billingInterval ?? null,
            'group' => $this->group ?? null,
            'revision' => $this->revision ?? null,
            'current' => $this->current ?? null,
            'selected' => $this->selected ?? null,
            'default' => $this->default ?? null,
            'trial' => $this->trial ?? null,
            'changePath' => $this->changePath ?? null,
            'price' => $this->price ?? null,
            'seatPrice' => $this->seatPrice ?? null,
            'savings' => $this->savings ?? null,
            'disabled' => $this->disabled ?? null,
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
            isset($data->{'billingInterval'}) ? Interval::jsonUnserialize($data->{'billingInterval'}) : null,
            isset($data->{'group'}) ? CheckoutPlanGroup::jsonUnserialize($data->{'group'}) : null,
            isset($data->{'revision'}) ? CheckoutPlanRevision::jsonUnserialize($data->{'revision'}) : null,
            $data->{'current'} ?? null,
            $data->{'selected'} ?? null,
            $data->{'default'} ?? null,
            isset($data->{'trial'}) ? CheckoutPlanTrial::jsonUnserialize($data->{'trial'}) : null,
            $data->{'changePath'} ?? null,
            isset($data->{'price'}) ? Price::jsonUnserialize($data->{'price'}) : null,
            isset($data->{'seatPrice'}) ? Price::jsonUnserialize($data->{'seatPrice'}) : null,
            isset($data->{'savings'}) ? CheckoutPlanSavings::jsonUnserialize($data->{'savings'}) : null,
            $data->{'disabled'} ?? null,
        );
    }
}
