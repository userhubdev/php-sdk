<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A quantity range within the tiered price.
 */
final class TieredPriceTier implements \JsonSerializable, JsonUnserializable
{
    /**
     * The upper quantity for tier (inclusive).
     */
    public ?int $upper;

    /**
     * The per quantity amount for the tier.
     */
    public ?string $unitAmount;

    /**
     * The flat amount for the tier.
     */
    public ?string $flatAmount;

    public function __construct(
        ?int $upper = null,
        ?string $unitAmount = null,
        ?string $flatAmount = null,
    ) {
        $this->upper = $upper ?? null;
        $this->unitAmount = $unitAmount ?? null;
        $this->flatAmount = $flatAmount ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'upper' => $this->upper ?? null,
            'unitAmount' => $this->unitAmount ?? null,
            'flatAmount' => $this->flatAmount ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'upper'} ?? null,
            $data->{'unitAmount'} ?? null,
            $data->{'flatAmount'} ?? null,
        );
    }
}
