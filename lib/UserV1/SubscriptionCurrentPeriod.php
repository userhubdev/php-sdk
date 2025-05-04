<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

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
    public ?\DateTimeInterface $startTime;

    /**
     * The time the current billing period ends.
     */
    public ?\DateTimeInterface $endTime;

    public function __construct(
        ?\DateTimeInterface $startTime = null,
        ?\DateTimeInterface $endTime = null,
    ) {
        $this->startTime = $startTime ?? null;
        $this->endTime = $endTime ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'startTime' => Util::encodeDateTime($this->startTime),
            'endTime' => Util::encodeDateTime($this->endTime),
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
