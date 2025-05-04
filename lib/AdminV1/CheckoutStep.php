<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

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
     * The trial step details.
     */
    public ?CheckoutTrialStep $trial;

    /**
     * The cancel step details.
     */
    public ?CheckoutCancelStep $cancel;

    /**
     * The complete payment step details.
     */
    public ?CheckoutCompletePaymentStep $completePayment;

    public function __construct(
        ?string $type = null,
        ?string $state = null,
        ?CheckoutTrialStep $trial = null,
        ?CheckoutCancelStep $cancel = null,
        ?CheckoutCompletePaymentStep $completePayment = null,
    ) {
        $this->type = $type ?? '';
        $this->state = $state ?? '';
        $this->trial = $trial ?? null;
        $this->cancel = $cancel ?? null;
        $this->completePayment = $completePayment ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'type' => $this->type,
            'state' => $this->state,
            'trial' => $this->trial,
            'cancel' => $this->cancel,
            'completePayment' => $this->completePayment,
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
            isset($data->{'trial'}) ? CheckoutTrialStep::jsonUnserialize($data->{'trial'}) : null,
            isset($data->{'cancel'}) ? CheckoutCancelStep::jsonUnserialize($data->{'cancel'}) : null,
            isset($data->{'completePayment'}) ? CheckoutCompletePaymentStep::jsonUnserialize($data->{'completePayment'}) : null,
        );
    }
}
