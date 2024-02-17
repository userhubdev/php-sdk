<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\AdminV1\Flow;
use UserHub\Internal\JsonUnserializable;

/**
 * The flows changed event.
 */
class FlowsChanged implements \JsonSerializable, JsonUnserializable
{
    /**
     * The flow.
     */
    public null|\UserHub\AdminV1\Flow $flow;

    public function __construct(
        null|Flow $flow = null,
    ) {
        $this->flow = $flow ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'flow' => $this->flow ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'flow'}) ? Flow::jsonUnserialize($data->{'flow'}) : null,
        );
    }
}
