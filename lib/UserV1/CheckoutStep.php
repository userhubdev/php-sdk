<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The checkout step.
 */
final class CheckoutStep implements \JsonSerializable, JsonUnserializable
{
    /**
     * The type of step.
     */
    public string $type;

    /**
     * The state of the step.
     */
    public string $state;

    /**
     * The complete payment step details.
     */
    public ?CheckoutCompletePaymentStep $completePayment;

    public function __construct(
        ?string $type = null,
        ?string $state = null,
        ?CheckoutCompletePaymentStep $completePayment = null,
    ) {
        $this->type = $type ?? '';
        $this->state = $state ?? '';
        $this->completePayment = $completePayment ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'type' => $this->type ?? null,
            'state' => $this->state ?? null,
            'completePayment' => $this->completePayment ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'type'} ?? null,
            $data->{'state'} ?? null,
            isset($data->{'completePayment'}) ? CheckoutCompletePaymentStep::jsonUnserialize($data->{'completePayment'}) : null,
        );
    }
}
