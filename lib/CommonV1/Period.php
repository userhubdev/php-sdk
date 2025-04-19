<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A period of time.
 */
final class Period implements \JsonSerializable, JsonUnserializable
{
    /**
     * The start time.
     */
    public ?\DateTimeInterface $startTime;

    /**
     * The end time.
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
