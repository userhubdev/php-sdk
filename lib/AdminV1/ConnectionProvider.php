<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The functionality the connection provides (e.g. `BILLING`).
 */
final class ConnectionProvider implements \JsonSerializable, JsonUnserializable
{
    /**
     * The provider type.
     */
    public string $type;

    /**
     * Whether the connection is the default for the provider type.
     */
    public ?bool $default;

    public function __construct(
        ?string $type = null,
        ?bool $default = null,
    ) {
        $this->type = $type ?? '';
        $this->default = $default ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'type' => $this->type ?? null,
            'default' => $this->default ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'type'} ?? null,
            $data->{'default'} ?? null,
        );
    }
}
