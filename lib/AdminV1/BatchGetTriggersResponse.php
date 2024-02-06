<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for BatchGetTriggers.
 */
class BatchGetTriggersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The triggers.
     *
     * @var \UserHub\AdminV1\TriggerResult[]
     */
    public array $triggers;

    public function __construct(
        null|array $triggers = null,
    ) {
        $this->triggers = $triggers ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'triggers' => isset($this->triggers) ? $this->triggers : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new BatchGetTriggersResponse(
            isset($data->{'triggers'}) ? Util::mapArray($data->{'triggers'}, [TriggerResult::class, 'jsonUnserialize']) : null,
        );
    }
}
