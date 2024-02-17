<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Interval;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Price for a product.
 */
class Price implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the price.
     */
    public string $id;

    /**
     * The connection.
     */
    public null|Connection $connection;

    /**
     * The external identifier of the connected price.
     */
    public null|string $externalId;

    /**
     * The status of the connected price.
     */
    public null|string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The currency for the price.
     */
    public string $currencyCode;

    /**
     * The billing mode for the price.
     */
    public string $billingMode;

    /**
     * The billing interval for the price.
     */
    public null|Interval $interval;

    /**
     * The admin-facing display name of the price.
     */
    public null|string $displayName;

    /**
     * The product associated with the price.
     */
    public null|Product $product;

    /**
     * The archived status of the price.
     *
     * It determines if the price can be used.
     */
    public null|bool $archived;

    /**
     * The last time the price was pulled from the connection.
     */
    public null|\DateTimeInterface $pullTime;

    /**
     * The last time the price was pushed to the connection.
     */
    public null|\DateTimeInterface $pushTime;

    /**
     * The creation time of the price.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the price.
     */
    public \DateTimeInterface $updateTime;

    /**
     * The price is fixed per quantity.
     */
    public null|PriceFixedPrice $fixed;

    /**
     * The price is dependent on the quantity.
     */
    public null|PriceTieredPrice $tiered;

    public function __construct(
        null|string $id = null,
        null|Connection $connection = null,
        null|string $externalId = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $currencyCode = null,
        null|string $billingMode = null,
        null|Interval $interval = null,
        null|string $displayName = null,
        null|Product $product = null,
        null|bool $archived = null,
        null|\DateTimeInterface $pullTime = null,
        null|\DateTimeInterface $pushTime = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
        null|PriceFixedPrice $fixed = null,
        null|PriceTieredPrice $tiered = null,
    ) {
        $this->id = $id ?? '';
        $this->connection = $connection ?? null;
        $this->externalId = $externalId ?? null;
        $this->state = $state ?? null;
        $this->stateReason = $stateReason ?? null;
        $this->currencyCode = $currencyCode ?? '';
        $this->billingMode = $billingMode ?? '';
        $this->interval = $interval ?? null;
        $this->displayName = $displayName ?? null;
        $this->product = $product ?? null;
        $this->archived = $archived ?? null;
        $this->pullTime = $pullTime ?? null;
        $this->pushTime = $pushTime ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->fixed = $fixed ?? null;
        $this->tiered = $tiered ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'connection' => $this->connection ?? null,
            'externalId' => $this->externalId ?? null,
            'state' => $this->state ?? null,
            'stateReason' => $this->stateReason ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'billingMode' => $this->billingMode ?? null,
            'interval' => $this->interval ?? null,
            'displayName' => $this->displayName ?? null,
            'product' => $this->product ?? null,
            'archived' => $this->archived ?? null,
            'pullTime' => isset($this->pullTime) ? Util::encodeDateTime($this->pullTime) : null,
            'pushTime' => isset($this->pushTime) ? Util::encodeDateTime($this->pushTime) : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
            'fixed' => $this->fixed ?? null,
            'tiered' => $this->tiered ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            $data->{'externalId'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            $data->{'currencyCode'} ?? null,
            $data->{'billingMode'} ?? null,
            isset($data->{'interval'}) ? Interval::jsonUnserialize($data->{'interval'}) : null,
            $data->{'displayName'} ?? null,
            isset($data->{'product'}) ? Product::jsonUnserialize($data->{'product'}) : null,
            $data->{'archived'} ?? null,
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'pushTime'}) ? Util::decodeDateTime($data->{'pushTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'fixed'}) ? PriceFixedPrice::jsonUnserialize($data->{'fixed'}) : null,
            isset($data->{'tiered'}) ? PriceTieredPrice::jsonUnserialize($data->{'tiered'}) : null,
        );
    }
}
