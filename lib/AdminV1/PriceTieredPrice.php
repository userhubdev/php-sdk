<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A pricing strategy that dynamically sets the price for a given
 * quantity range.
 */
final class PriceTieredPrice implements \JsonSerializable, JsonUnserializable
{
    /**
     * The strategy for evaluating the tiers.
     */
    public string $mode;

    /**
     * The tiers for the price.
     *
     * @var PriceTieredPriceTier[]
     */
    public array $tiers;

    /**
     * @param null|PriceTieredPriceTier[] $tiers
     */
    public function __construct(
        ?string $mode = null,
        ?array $tiers = null,
    ) {
        $this->mode = $mode ?? '';
        $this->tiers = $tiers ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'mode' => $this->mode ?? null,
            'tiers' => $this->tiers ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'mode'} ?? null,
            isset($data->{'tiers'}) ? Util::mapArray($data->{'tiers'}, [PriceTieredPriceTier::class, 'jsonUnserialize']) : null,
        );
    }
}
