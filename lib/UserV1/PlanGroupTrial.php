<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The trial settings.
 */
final class PlanGroupTrial implements \JsonSerializable, JsonUnserializable
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
            'days' => $this->days ?? null,
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
