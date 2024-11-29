<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\ApiV1\Status;
use UserHub\Internal\JsonUnserializable;

/**
 * Result wrapper for a trigger.
 */
final class TriggerResult implements \JsonSerializable, JsonUnserializable
{
    /**
     * The trigger.
     */
    public ?Trigger $trigger;

    /**
     * The trigger error.
     */
    public ?Status $error;

    public function __construct(
        ?Trigger $trigger = null,
        ?Status $error = null,
    ) {
        $this->trigger = $trigger ?? null;
        $this->error = $error ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'trigger' => $this->trigger ?? null,
            'error' => $this->error ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'trigger'}) ? Trigger::jsonUnserialize($data->{'trigger'}) : null,
            isset($data->{'error'}) ? Status::jsonUnserialize($data->{'error'}) : null,
        );
    }
}
