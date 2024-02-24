<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Information about the current billing period.
 */
final class SubscriptionCurrentPeriod implements \JsonSerializable, JsonUnserializable
{
    /**
     * The time the current billing period started.
     */
    public null|\DateTimeInterface $startTime;

    /**
     * The time the current billing period ends.
     */
    public null|\DateTimeInterface $endTime;

    public function __construct(
        null|\DateTimeInterface $startTime = null,
        null|\DateTimeInterface $endTime = null,
    ) {
        $this->startTime = $startTime ?? null;
        $this->endTime = $endTime ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'startTime' => isset($this->startTime) ? Util::encodeDateTime($this->startTime) : null,
            'endTime' => isset($this->endTime) ? Util::encodeDateTime($this->endTime) : null,
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
        );
    }
}
