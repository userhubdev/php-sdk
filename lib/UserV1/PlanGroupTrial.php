<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The trial settings.
 */
class PlanGroupTrial implements \JsonSerializable, JsonUnserializable
{
    /**
     * The number of days in the trial.
     */
    public null|int $days;

    public function __construct(
        null|int $days = null,
    ) {
        $this->days = $days ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'days' => isset($this->days) ? $this->days : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PlanGroupTrial(
            isset($data->{'days'}) ? $data->{'days'} : null,
        );
    }
}
