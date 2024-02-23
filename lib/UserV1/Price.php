<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

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
     * The price is fixed per quantity.
     */
    public null|PriceFixedPrice $fixed;

    /**
     * The price is dependent on the quantity.
     */
    public null|PriceTieredPrice $tiered;

    public function __construct(
        null|string $id = null,
        null|string $currencyCode = null,
        null|string $billingMode = null,
        null|Interval $interval = null,
        null|PriceFixedPrice $fixed = null,
        null|PriceTieredPrice $tiered = null,
    ) {
        $this->id = $id ?? '';
        $this->currencyCode = $currencyCode ?? '';
        $this->billingMode = $billingMode ?? '';
        $this->interval = $interval ?? null;
        $this->fixed = $fixed ?? null;
        $this->tiered = $tiered ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'billingMode' => $this->billingMode ?? null,
            'interval' => $this->interval ?? null,
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
            $data->{'currencyCode'} ?? null,
            $data->{'billingMode'} ?? null,
            isset($data->{'interval'}) ? Interval::jsonUnserialize($data->{'interval'}) : null,
            isset($data->{'fixed'}) ? PriceFixedPrice::jsonUnserialize($data->{'fixed'}) : null,
            isset($data->{'tiered'}) ? PriceTieredPrice::jsonUnserialize($data->{'tiered'}) : null,
        );
    }
}
