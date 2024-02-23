<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

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
    public string $direction;

    public function __construct(
        null|string $direction = null,
    ) {
        $this->direction = $direction ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'direction' => $this->direction ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'direction'} ?? null,
        );
    }
}
