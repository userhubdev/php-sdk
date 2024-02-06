<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\ApiV1\Status;
use UserHub\Internal\JsonUnserializable;

/**
 * Result wrapper for a trigger.
 */
class TriggerResult implements \JsonSerializable, JsonUnserializable
{
    /**
     * The trigger.
     */
    public null|\UserHub\AdminV1\Trigger $trigger;

    /**
     * The trigger error.
     */
    public null|\UserHub\ApiV1\Status $error;

    public function __construct(
        null|Trigger $trigger = null,
        null|Status $error = null,
    ) {
        $this->trigger = $trigger ?? null;
        $this->error = $error ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'trigger' => isset($this->trigger) ? $this->trigger : null,
            'error' => isset($this->error) ? $this->error : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new TriggerResult(
            isset($data->{'trigger'}) ? Trigger::jsonUnserialize($data->{'trigger'}) : null,
            isset($data->{'error'}) ? Status::jsonUnserialize($data->{'error'}) : null,
        );
    }
}
