<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The discount.
 */
final class CheckoutDiscount implements \JsonSerializable, JsonUnserializable
{
    /**
     * The checkout discount identifier.
     */
    public string $id;

    /**
     * The discount code.
     */
    public ?string $code;

    public function __construct(
        ?string $id = null,
        ?string $code = null,
    ) {
        $this->id = $id ?? '';
        $this->code = $code ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'code' => $this->code,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'code'} ?? null,
        );
    }
}
