<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The subscription items.
 */
final class UpdateSubscriptionItemsRequestItem implements \JsonSerializable, JsonUnserializable
{
    /**
     * The product identifier.
     *
     * If this is empty and the user ID is set, the default
     * seat will be used.
     */
    public string $productId;

    /**
     * The member user ID of the organization member. This can
     * only be specified for seat items.
     */
    public ?string $userId;

    /**
     * The quantity for the item.
     *
     * If this is `0` the item will be removed.
     */
    public ?int $quantity;

    public function __construct(
        ?string $productId = null,
        ?string $userId = null,
        ?int $quantity = null,
    ) {
        $this->productId = $productId ?? '';
        $this->userId = $userId ?? null;
        $this->quantity = $quantity ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'productId' => $this->productId ?? null,
            'userId' => $this->userId ?? null,
            'quantity' => $this->quantity ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'productId'} ?? null,
            $data->{'userId'} ?? null,
            $data->{'quantity'} ?? null,
        );
    }
}
