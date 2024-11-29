<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for BatchDeleteTriggers.
 */
final class BatchDeleteTriggersResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The triggers.
     *
     * @var TriggerResult[]
     */
    public array $triggers;

    /**
     * @param null|TriggerResult[] $triggers
     */
    public function __construct(
        ?array $triggers = null,
    ) {
        $this->triggers = $triggers ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'triggers' => $this->triggers ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'triggers'}) ? Util::mapArray($data->{'triggers'}, [TriggerResult::class, 'jsonUnserialize']) : null,
        );
    }
}
