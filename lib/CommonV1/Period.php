<?php

// Code generated. DO NOT EDIT.

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A period of time.
 */
class Period implements \JsonSerializable, JsonUnserializable
{
    /**
     * The start time.
     */
    public null|\DateTimeInterface $startTime;

    /**
     * The end time.
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
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Period(
            isset($data->{'startTime'}) ? Util::decodeDateTime($data->{'startTime'}) : null,
            isset($data->{'endTime'}) ? Util::decodeDateTime($data->{'endTime'}) : null,
        );
    }
}
