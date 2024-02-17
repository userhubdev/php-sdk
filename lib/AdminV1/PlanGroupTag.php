<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

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
            'tag' => $this->tag ?? null,
            'revisionId' => $this->revisionId ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'tag'} ?? null,
            $data->{'revisionId'} ?? null,
        );
    }
}
