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
final class PlanGroupRevisionPlan implements \JsonSerializable, JsonUnserializable
{
    /**
     * The client defined unique identifier for the plan (e.g. `monthly`).
     */
    public string $uniqueId;

    /**
     * The details of the associated connection.
     */
    public ?Connection $connection;

    /**
     * The billing interval for the plan.
     */
    public ?Interval $interval;

    /**
     * The customer facing human-readable display name for the plan.
     */
    public ?string $displayName;

    /**
     * The admin facing description of the plan.
     *
     * The maximum length is 1000 characters.
     */
    public ?string $description;

    /**
     * The prices associated with the plan.
     *
     * There should be a price for each product/currency
     * combination.
     *
     * @var Price[]
     */
    public array $prices;

    /**
     * The visibility of the plan.
     */
    public string $visibility;

    /**
     * @param null|Price[] $prices
     */
    public function __construct(
        ?string $uniqueId = null,
        ?Connection $connection = null,
        ?Interval $interval = null,
        ?string $displayName = null,
        ?string $description = null,
        ?array $prices = null,
        ?string $visibility = null,
    ) {
        $this->uniqueId = $uniqueId ?? '';
        $this->connection = $connection ?? null;
        $this->interval = $interval ?? new Interval();
        $this->displayName = $displayName ?? null;
        $this->description = $description ?? null;
        $this->prices = $prices ?? [];
        $this->visibility = $visibility ?? '';
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
