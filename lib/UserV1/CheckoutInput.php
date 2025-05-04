<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Checkout input parameters.
 */
final class CheckoutInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the organization.
     *
     * This must be provided for organization checkouts.
     */
    public string $organizationId;

    /**
     * The type of the checkout.
     */
    public string $type;

    /**
     * The identifier of the plan.
     *
     * This allows you to specify the currently selected plan.
     */
    public string $planId;

    public function __construct(
        ?string $organizationId = null,
        ?string $type = null,
        ?string $planId = null,
    ) {
        $this->organizationId = $organizationId ?? '';
        $this->type = $type ?? '';
        $this->planId = $planId ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organizationId' => $this->organizationId,
            'type' => $this->type,
            'planId' => $this->planId,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'organizationId'} ?? null,
            $data->{'type'} ?? null,
            $data->{'planId'} ?? null,
        );
    }
}
