<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Address;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A link to an external payment method (e.g. credit card, bank account).
 */
class PaymentMethod implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the payment method.
     */
    public null|string $id;

    /**
     * The external identifier of the connected payment method.
     */
    public null|string $externalId;

    /**
     * The status of the connected payment method.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The payment method type.
     */
    public string $type;

    /**
     * A human readable description of the payment method.
     *
     * This can be used to show a description of the payment method
     * when the type is UNKNOWN or not explicitly handled.
     */
    public null|string $displayName;

    /**
     * The full name of the owner of the payment method.
     */
    public null|string $fullName;

    /**
     * The address for the payment method.
     */
    public null|Address $address;

    /**
     * Whether the payment method is the default for the connected account.
     */
    public null|bool $default;

    /**
     * The last time the payment method was pulled from the connection.
     */
    public null|\DateTimeInterface $pullTime;

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
    public null|CardPaymentMethod $card;

    public function __construct(
        null|string $id = null,
        null|string $externalId = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $type = null,
        null|string $displayName = null,
        null|string $fullName = null,
        null|Address $address = null,
        null|bool $default = null,
        null|\DateTimeInterface $pullTime = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
        null|CardPaymentMethod $card = null,
    ) {
        $this->id = $id ?? null;
        $this->externalId = $externalId ?? null;
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->type = $type ?? '';
        $this->displayName = $displayName ?? null;
        $this->fullName = $fullName ?? null;
        $this->address = $address ?? null;
        $this->default = $default ?? null;
        $this->pullTime = $pullTime ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->card = $card ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'externalId' => $this->externalId ?? null,
            'state' => $this->state ?? null,
            'stateReason' => $this->stateReason ?? null,
            'type' => $this->type ?? null,
            'displayName' => $this->displayName ?? null,
            'fullName' => $this->fullName ?? null,
            'address' => $this->address ?? null,
            'default' => $this->default ?? null,
            'pullTime' => isset($this->pullTime) ? Util::encodeDateTime($this->pullTime) : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
            'card' => $this->card ?? null,
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
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'card'}) ? CardPaymentMethod::jsonUnserialize($data->{'card'}) : null,
        );
    }
}
