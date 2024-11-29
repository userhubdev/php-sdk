<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The savings for the plan.
 */
final class CheckoutPlanSavings implements \JsonSerializable, JsonUnserializable
{
    /**
     * The percentage savings (1-100).
     *
     * This percentage is rounded down.
     */
    public ?int $percentage;

    public function __construct(
        ?int $percentage = null,
    ) {
        $this->percentage = $percentage ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'percentage' => $this->percentage ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'percentage'} ?? null,
        );
    }
}
