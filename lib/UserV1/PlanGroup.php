<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Plan group is a collection of related plans.
 *
 * A plan group will generally describe a tier of plans offered
 * (e.g. Basic vs Pro) which might contain multiple billing options
 * (e.g. monthly vs yearly, USD vs EUR).
 */
class PlanGroup implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the plan group.
     */
    public string $id;

    /**
     * The client defined unique identifier of the plan group (e.g. `pro`).
     */
    public null|string $uniqueId;

    /**
     * The name of the plan group.
     */
    public string $displayName;

    /**
     * The user facing description of the plan group.
     */
    public null|string $description;

    /**
     * Whether the plans are for organizations or users.
     */
    public string $accountType;

    /**
     * The trial settings.
     *
     * For authenticated requests, this will not be set when the account
     * isn't eligible for a trial.
     */
    public null|PlanGroupTrial $trial;

    /**
     * Whether the plan is considered an downgrade or upgrade.
     */
    public null|PlanGroupChangePath $changePath;

    /**
     * The plans associated with plan group.
     *
     * @var \UserHub\UserV1\Plan[]
     */
    public array $plans;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $description = null,
        null|string $accountType = null,
        null|PlanGroupTrial $trial = null,
        null|PlanGroupChangePath $changePath = null,
        null|array $plans = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
        $this->description = $description ?? null;
        $this->accountType = $accountType ?? '';
        $this->trial = $trial ?? null;
        $this->changePath = $changePath ?? null;
        $this->plans = $plans ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'displayName' => $this->displayName ?? null,
            'description' => $this->description ?? null,
            'accountType' => $this->accountType ?? null,
            'trial' => $this->trial ?? null,
            'changePath' => $this->changePath ?? null,
            'plans' => $this->plans ?? null,
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
            $data->{'displayName'} ?? null,
            $data->{'description'} ?? null,
            $data->{'accountType'} ?? null,
            isset($data->{'trial'}) ? PlanGroupTrial::jsonUnserialize($data->{'trial'}) : null,
            isset($data->{'changePath'}) ? PlanGroupChangePath::jsonUnserialize($data->{'changePath'}) : null,
            isset($data->{'plans'}) ? Util::mapArray($data->{'plans'}, [Plan::class, 'jsonUnserialize']) : null,
        );
    }
}
