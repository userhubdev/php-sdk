<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

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
    public null|string $fullName;

    /**
     * The address for the payment method.
     */
    public null|Address $address;

    /**
     * Whether the payment method is the default for the account.
     */
    public bool $default;

    /**
     * The last payment error.
     *
     * This will be unset if the payment method is updated
     * or if a payment succeeds.
     */
    public null|Status $lastPaymentError;

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
        null|string $type = null,
        null|string $displayName = null,
        null|string $fullName = null,
        null|Address $address = null,
        null|bool $default = null,
        null|Status $lastPaymentError = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
        null|CardPaymentMethod $card = null,
    ) {
        $this->id = $id ?? '';
        $this->type = $type ?? '';
        $this->displayName = $displayName ?? '';
        $this->fullName = $fullName ?? null;
        $this->address = $address ?? null;
        $this->default = $default ?? false;
        $this->lastPaymentError = $lastPaymentError ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->card = $card ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'displayName' => $this->displayName ?? null,
            'fullName' => $this->fullName ?? null,
            'address' => $this->address ?? null,
            'default' => $this->default ?? null,
            'lastPaymentError' => $this->lastPaymentError ?? null,
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
            $data->{'type'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'fullName'} ?? null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            $data->{'default'} ?? null,
            isset($data->{'lastPaymentError'}) ? Status::jsonUnserialize($data->{'lastPaymentError'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'card'}) ? CardPaymentMethod::jsonUnserialize($data->{'card'}) : null,
        );
    }
}
