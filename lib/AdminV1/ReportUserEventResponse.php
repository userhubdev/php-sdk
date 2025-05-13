<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Response message for ReportUserEvent.
 */
final class ReportUserEventResponse implements \JsonSerializable, JsonUnserializable
{
    public function __construct(
    ) {}

    public function jsonSerialize(): mixed
    {
        return (object) [
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
        );
    }
}
