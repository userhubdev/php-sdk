<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\ApiV1\Status;
use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A link to an external payment method (e.g. credit card, bank account).
 */
final class PaymentMethod implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the payment method.
     */
    public string $id;

    /**
     * The external identifier of the connected payment method.
     */
    public string $externalId;

    /**
     * The status of the connected payment method.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public ?string $stateReason;

    /**
     * The payment method type.
     */
    public string $type;

    /**
     * A human-readable description of the payment method.
     *
     * This can be used to show a description of the payment method
     * when the type is UNKNOWN or not explicitly handled.
     */
    public string $displayName;

    /**
     * The full name of the owner of the payment method.
     */
    public ?string $fullName;

    /**
     * The address for the payment method.
     */
    public ?Address $address;

    /**
     * Whether the payment method is the default for the connected account.
     */
    public ?bool $default;

    /**
     * The last payment error.
     *
     * This will be unset if the payment method is updated
     * or if a payment succeeds.
     */
    public ?Status $lastPaymentError;

    /**
     * The last time the payment method was pulled from the connection.
     */
    public ?\DateTimeInterface $pullTime;

    /**
     * The creation time of the payment method connection.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the payment method connection.
     */
    public \DateTimeInterface $updateTime;

    /**
     * Card payment method (e.g. Visa credit card).
     */
    public ?CardPaymentMethod $card;

    public function __construct(
        ?string $id = null,
        ?string $externalId = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?string $type = null,
        ?string $displayName = null,
        ?string $fullName = null,
        ?Address $address = null,
        ?bool $default = null,
        ?Status $lastPaymentError = null,
        ?\DateTimeInterface $pullTime = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
        ?CardPaymentMethod $card = null,
    ) {
        $this->id = $id ?? '';
        $this->externalId = $externalId ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->type = $type ?? '';
        $this->displayName = $displayName ?? '';
        $this->fullName = $fullName ?? null;
        $this->address = $address ?? null;
        $this->default = $default ?? null;
        $this->lastPaymentError = $lastPaymentError ?? null;
        $this->pullTime = $pullTime ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->card = $card ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'externalId' => $this->externalId,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'type' => $this->type,
            'displayName' => $this->displayName,
            'fullName' => $this->fullName,
            'address' => $this->address,
            'default' => $this->default,
            'lastPaymentError' => $this->lastPaymentError,
            'pullTime' => Util::encodeDateTime($this->pullTime),
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
            'card' => $this->card,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'externalId'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            $data->{'type'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'fullName'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            $data->{'default'} ?? null,
            isset($data->{'lastPaymentError'}) ? Status::jsonUnserialize($data->{'lastPaymentError'}) : null,
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'card'}) ? CardPaymentMethod::jsonUnserialize($data->{'card'}) : null,
        );
    }
}
