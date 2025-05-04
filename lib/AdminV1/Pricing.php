<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The plans available in checkout.
 */
final class Pricing implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of plans.
     *
     * @var Plan[]
     */
    public array $plans;

    /**
     * @param null|Plan[] $plans
     */
    public function __construct(
        ?array $plans = null,
    ) {
        $this->plans = $plans ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'plans' => $this->plans,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'plans'}) ? Util::mapArray($data->{'plans'}, [Plan::class, 'jsonUnserialize']) : null,
        );
    }
}
