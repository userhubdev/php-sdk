<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The builtin email specific connection data.
 */
final class BuiltinEmailConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The allowed email list.
     *
     * @var string[]
     */
    public array $allowedEmails;

    /**
     * @param null|string[] $allowedEmails
     */
    public function __construct(
        ?array $allowedEmails = null,
    ) {
        $this->allowedEmails = $allowedEmails ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'allowedEmails' => $this->allowedEmails ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'allowedEmails'} ?? null,
        );
    }
}
