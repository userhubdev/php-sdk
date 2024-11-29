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
    public ?string $fullName;

    /**
     * The address for the payment method.
     */
    public ?Address $address;

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
    public ?Status $lastPaymentError;

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
        ?string $type = null,
        ?string $displayName = null,
        ?string $fullName = null,
        ?Address $address = null,
        ?bool $default = null,
        ?Status $lastPaymentError = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
        ?CardPaymentMethod $card = null,
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
