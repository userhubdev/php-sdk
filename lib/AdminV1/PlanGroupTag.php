<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A tag which references a specific plan group revision.
 */
class PlanGroupTag implements \JsonSerializable, JsonUnserializable
{
    /**
     * The client defined tag (e.g. `2023`).
     */
    public string $tag;

    /**
     * The system-assigned identifier of the plan group revision.
     */
    public string $revisionId;

    public function __construct(
        null|string $tag = null,
        null|string $revisionId = null,
    ) {
        $this->tag = $tag ?? '';
        $this->revisionId = $revisionId ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'tag' => isset($this->tag) ? $this->tag : null,
            'revisionId' => isset($this->revisionId) ? $this->revisionId : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PlanGroupTag(
            isset($data->{'tag'}) ? $data->{'tag'} : null,
            isset($data->{'revisionId'}) ? $data->{'revisionId'} : null,
        );
    }
}
