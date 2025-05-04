<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Checkout item input.
 */
final class CheckoutItemInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the item.
     */
    public string $id;

    /**
     * The quantity for the item.
     */
    public ?int $quantity;

    public function __construct(
        ?string $id = null,
        ?int $quantity = null,
    ) {
        $this->id = $id ?? '';
        $this->quantity = $quantity ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'quantity' => $this->quantity,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'quantity'} ?? null,
        );
    }
}
