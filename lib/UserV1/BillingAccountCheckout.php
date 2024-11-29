<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The discount.
 */
final class BillingAccountCheckout implements \JsonSerializable, JsonUnserializable
{
    /**
     * The type of checkout.
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
            'type' => $this->type ?? null,
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
