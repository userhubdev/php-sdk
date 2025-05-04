<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Checkout input parameters.
 */
final class CheckoutInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the organization.
     *
     * This is required if the user identifier is not specified.
     */
    public string $organizationId;

    /**
     * The identifier of the user.
     *
     * This is required if the organization identifier is not specified.
     */
    public string $userId;

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

    /**
     * The identifier of the subscriptions.
     *
     * This allows you to specify a non-default subscription.
     */
    public string $subscriptionId;

    /**
     * The identifier of the connection.
     *
     * This allows you to specify a non-default billing connection.
     */
    public string $connectionId;

    public function __construct(
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $type = null,
        ?string $planId = null,
        ?string $subscriptionId = null,
        ?string $connectionId = null,
    ) {
        $this->organizationId = $organizationId ?? '';
        $this->userId = $userId ?? '';
        $this->type = $type ?? '';
        $this->planId = $planId ?? '';
        $this->subscriptionId = $subscriptionId ?? '';
        $this->connectionId = $connectionId ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organizationId' => $this->organizationId,
            'userId' => $this->userId,
            'type' => $this->type,
            'planId' => $this->planId,
            'subscriptionId' => $this->subscriptionId,
            'connectionId' => $this->connectionId,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'organizationId'} ?? null,
            $data->{'userId'} ?? null,
            $data->{'type'} ?? null,
            $data->{'planId'} ?? null,
            $data->{'subscriptionId'} ?? null,
            $data->{'connectionId'} ?? null,
        );
    }
}
