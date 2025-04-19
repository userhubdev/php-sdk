<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The field view options..
 */
final class FieldView implements \JsonSerializable, JsonUnserializable
{
    /**
     * Whether the field is included in the view.
     *
     * THis overrides the message default.
     */
    public string $include;

    /**
     * Whether the field is excluded from the view.
     *
     * THis overrides the message default.
     */
    public string $exclude;

    /**
     * The referenced type's view.
     */
    public ?string $type;

    public function __construct(
        ?string $include = null,
        ?string $exclude = null,
        ?string $type = null,
    ) {
        $this->include = $include ?? '';
        $this->exclude = $exclude ?? '';
        $this->type = $type ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'include' => $this->include,
            'exclude' => $this->exclude,
            'type' => $this->type,
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
            $data->{'type'} ?? null,
        );
    }
}
