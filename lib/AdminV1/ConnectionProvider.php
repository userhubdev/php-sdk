<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The functionality the connection provides (e.g. `BILLING`).
 */
class ConnectionProvider implements \JsonSerializable, JsonUnserializable
{
    /**
     * The provider type.
     */
    public string $type;

    /**
     * Whether the connection is the default for the provider type.
     */
    public null|bool $default;

    public function __construct(
        null|string $type = null,
        null|bool $default = null,
    ) {
        $this->type = $type ?? '';
        $this->default = $default ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'type' => isset($this->type) ? $this->type : null,
            'default' => isset($this->default) ? $this->default : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new ConnectionProvider(
            isset($data->{'type'}) ? $data->{'type'} : null,
            isset($data->{'default'}) ? $data->{'default'} : null,
        );
    }
}
