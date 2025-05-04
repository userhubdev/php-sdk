<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The cancel step details.
 */
final class CheckoutCancelStep implements \JsonSerializable, JsonUnserializable
{
    /**
     * The type of cancellation.
     */
    public string $type;

    public function __construct(
        ?string $type = null,
    ) {
        $this->type = $type ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'type' => $this->type,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'type'} ?? null,
        );
    }
}
