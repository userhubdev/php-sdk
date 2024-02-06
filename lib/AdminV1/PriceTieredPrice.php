<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A pricing strategy that dynamically sets the price for a given
 * quantity range.
 */
class PriceTieredPrice implements \JsonSerializable, JsonUnserializable
{
    /**
     * The strategy for evaluating the tiers.
     */
    public string $mode;

    /**
     * The tiers for the price.
     *
     * @var \UserHub\AdminV1\TieredPriceTier[]
     */
    public array $tiers;

    public function __construct(
        null|string $mode = null,
        null|array $tiers = null,
    ) {
        $this->mode = $mode ?? '';
        $this->tiers = $tiers ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'mode' => isset($this->mode) ? $this->mode : null,
            'tiers' => isset($this->tiers) ? $this->tiers : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PriceTieredPrice(
            isset($data->{'mode'}) ? $data->{'mode'} : null,
            isset($data->{'tiers'}) ? Util::mapArray($data->{'tiers'}, [TieredPriceTier::class, 'jsonUnserialize']) : null,
        );
    }
}
