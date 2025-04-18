<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The trial details.
 */
final class PlanTrial implements \JsonSerializable, JsonUnserializable
{
    /**
     * The number of days in the trial.
     */
    public int $days;

    public function __construct(
        ?int $days = null,
    ) {
        $this->days = $days ?? 0;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'days' => $this->days,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'days'} ?? null,
        );
    }
}
