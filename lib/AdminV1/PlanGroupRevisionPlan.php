<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Interval;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The actual plan within the plan group. This defines the associated
 * connection and billing interval.
 */
class PlanGroupRevisionPlan implements \JsonSerializable, JsonUnserializable
{
    /**
     * The client defined unique identifier for the plan (e.g. `monthly`).
     */
    public null|string $uniqueId;

    /**
     * The details of the associated connection.
     */
    public null|Connection $connection;

    /**
     * The billing interval for the plan.
     */
    public null|Interval $interval;

    /**
     * The customer facing human-readable display name for the plan.
     */
    public null|string $displayName;

    /**
     * The admin facing description of the plan.
     *
     * The maximum length is 1000 characters.
     */
    public null|string $description;

    /**
     * The prices associated with the plan.
     *
     * There should be a price for each product/currency
     * combination.
     *
     * @var \UserHub\AdminV1\Price[]
     */
    public array $prices;

    /**
     * The visibility of the plan.
     */
    public null|string $visibility;

    public function __construct(
        null|string $uniqueId = null,
        null|Connection $connection = null,
        null|Interval $interval = null,
        null|string $displayName = null,
        null|string $description = null,
        null|array $prices = null,
        null|string $visibility = null,
    ) {
        $this->uniqueId = $uniqueId ?? null;
        $this->connection = $connection ?? null;
        $this->interval = $interval ?? null;
        $this->displayName = $displayName ?? null;
        $this->description = $description ?? null;
        $this->prices = $prices ?? [];
        $this->visibility = $visibility ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'uniqueId' => $this->uniqueId ?? null,
            'connection' => $this->connection ?? null,
            'interval' => $this->interval ?? null,
            'displayName' => $this->displayName ?? null,
            'description' => $this->description ?? null,
            'prices' => $this->prices ?? null,
            'visibility' => $this->visibility ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'uniqueId'} ?? null,
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            isset($data->{'interval'}) ? Interval::jsonUnserialize($data->{'interval'}) : null,
            $data->{'displayName'} ?? null,
            $data->{'description'} ?? null,
            isset($data->{'prices'}) ? Util::mapArray($data->{'prices'}, [Price::class, 'jsonUnserialize']) : null,
            $data->{'visibility'} ?? null,
        );
    }
}
