<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The message view options.
 */
final class MessageView implements \JsonSerializable, JsonUnserializable
{
    /**
     * Whether all fields are included in the view by default.
     */
    public string $include;

    /**
     * Whether all fields are excluded from the view by default.
     */
    public string $exclude;

    public function __construct(
        ?string $include = null,
        ?string $exclude = null,
    ) {
        $this->include = $include ?? '';
        $this->exclude = $exclude ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'include' => $this->include,
            'exclude' => $this->exclude,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'include'} ?? null,
            $data->{'exclude'} ?? null,
        );
    }
}
