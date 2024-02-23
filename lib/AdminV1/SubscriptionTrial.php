<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The trial information for the subscription.
 */
class SubscriptionTrial implements \JsonSerializable, JsonUnserializable
{
    /**
     * The time the trial started.
     */
    public null|\DateTimeInterface $startTime;

    /**
     * The time the trial ended/ends.
     */
    public null|\DateTimeInterface $endTime;

    /**
     * The number of days in the trial.
     *
     * This number is rounded to the nearest whole number
     * of days.
     */
    public int $days;

    /**
     * The number of days remaining in the trial.
     *
     * This number is rounded down, so will generally be
     * less than days. It will be zero on the last day
     * of the trial and null when the trial expires.
     */
    public null|int $remainingDays;

    public function __construct(
        null|\DateTimeInterface $startTime = null,
        null|\DateTimeInterface $endTime = null,
        null|int $days = null,
        null|int $remainingDays = null,
    ) {
        $this->startTime = $startTime ?? null;
        $this->endTime = $endTime ?? null;
        $this->days = $days ?? 0;
        $this->remainingDays = $remainingDays ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'startTime' => isset($this->startTime) ? Util::encodeDateTime($this->startTime) : null,
            'endTime' => isset($this->endTime) ? Util::encodeDateTime($this->endTime) : null,
            'days' => $this->days ?? null,
            'remainingDays' => $this->remainingDays ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'startTime'}) ? Util::decodeDateTime($data->{'startTime'}) : null,
            isset($data->{'endTime'}) ? Util::decodeDateTime($data->{'endTime'}) : null,
            $data->{'days'} ?? null,
            $data->{'remainingDays'} ?? null,
        );
    }
}
