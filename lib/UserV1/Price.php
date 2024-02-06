<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\CommonV1\Interval;
use UserHub\Internal\JsonUnserializable;

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
     * The currency for the price.
     */
    public null|string $currencyCode;

    /**
     * The billing mode for the price.
     */
    public null|string $billingMode;

    /**
     * The billing interval for the price.
     */
    public null|\UserHub\CommonV1\Interval $interval;

    /**
     * The price is fixed per quantity.
     */
    public null|\UserHub\UserV1\PriceFixedPrice $fixed;

    /**
     * The price is dependent on the quantity.
     */
    public null|\UserHub\UserV1\PriceTieredPrice $tiered;

    public function __construct(
        null|string $id = null,
        null|string $currencyCode = null,
        null|string $billingMode = null,
        null|Interval $interval = null,
        null|PriceFixedPrice $fixed = null,
        null|PriceTieredPrice $tiered = null,
    ) {
        $this->id = $id ?? '';
        $this->currencyCode = $currencyCode ?? null;
        $this->billingMode = $billingMode ?? null;
        $this->interval = $interval ?? null;
        $this->fixed = $fixed ?? null;
        $this->tiered = $tiered ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'currencyCode' => isset($this->currencyCode) ? $this->currencyCode : null,
            'billingMode' => isset($this->billingMode) ? $this->billingMode : null,
            'interval' => isset($this->interval) ? $this->interval : null,
            'fixed' => isset($this->fixed) ? $this->fixed : null,
            'tiered' => isset($this->tiered) ? $this->tiered : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Price(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'currencyCode'}) ? $data->{'currencyCode'} : null,
            isset($data->{'billingMode'}) ? $data->{'billingMode'} : null,
            isset($data->{'interval'}) ? Interval::jsonUnserialize($data->{'interval'}) : null,
            isset($data->{'fixed'}) ? PriceFixedPrice::jsonUnserialize($data->{'fixed'}) : null,
            isset($data->{'tiered'}) ? PriceTieredPrice::jsonUnserialize($data->{'tiered'}) : null,
        );
    }
}
