<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The builtin email specific connection data.
 */
class BuiltinEmailConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The allowed email list.
     *
     * @var string[]
     */
    public array $allowedEmails;

    public function __construct(
        null|array $allowedEmails = null,
    ) {
        $this->allowedEmails = $allowedEmails ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'allowedEmails' => isset($this->allowedEmails) ? $this->allowedEmails : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new BuiltinEmailConnection(
            isset($data->{'allowedEmails'}) ? $data->{'allowedEmails'} : null,
        );
    }
}
