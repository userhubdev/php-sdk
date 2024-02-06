<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The change path.
 */
class PlanGroupChangePath implements \JsonSerializable, JsonUnserializable
{
    /**
     * Whether the change is considered an upgrade or
     * a downgrade.
     */
    public null|string $direction;

    public function __construct(
        null|string $direction = null,
    ) {
        $this->direction = $direction ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'direction' => isset($this->direction) ? $this->direction : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PlanGroupChangePath(
            isset($data->{'direction'}) ? $data->{'direction'} : null,
        );
    }
}
