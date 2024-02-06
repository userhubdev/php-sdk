<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

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
    public null|\UserHub\CommonV1\Address $address;

    /**
     * Whether the payment method is the default for the account.
     */
    public null|bool $default;

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
    public null|\UserHub\UserV1\CardPaymentMethod $card;

    public function __construct(
        null|string $id = null,
        null|string $type = null,
        null|string $displayName = null,
        null|string $fullName = null,
        null|Address $address = null,
        null|bool $default = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
        null|CardPaymentMethod $card = null,
    ) {
        $this->id = $id ?? null;
        $this->type = $type ?? '';
        $this->displayName = $displayName ?? null;
        $this->fullName = $fullName ?? null;
        $this->address = $address ?? null;
        $this->default = $default ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->card = $card ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'type' => isset($this->type) ? $this->type : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'fullName' => isset($this->fullName) ? $this->fullName : null,
            'address' => isset($this->address) ? $this->address : null,
            'default' => isset($this->default) ? $this->default : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
            'card' => isset($this->card) ? $this->card : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PaymentMethod(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'type'}) ? $data->{'type'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'fullName'}) ? $data->{'fullName'} : null,
            isset($data->{'address'}) ? Address::jsonUnserialize($data->{'address'}) : null,
            isset($data->{'default'}) ? $data->{'default'} : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'card'}) ? CardPaymentMethod::jsonUnserialize($data->{'card'}) : null,
        );
    }
}
