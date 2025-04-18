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
final class Price implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the price.
     */
    public string $id;

    /**
     * The connection.
     */
    public ?Connection $connection;

    /**
     * The external identifier of the connected price.
     */
    public string $externalId;

    /**
     * The status of the connected price.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public ?string $stateReason;

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
    public ?Interval $interval;

    /**
     * The admin-facing display name of the price.
     */
    public ?string $displayName;

    /**
     * The product associated with the price.
     */
    public ?Product $product;

    /**
     * The archived status of the price.
     *
     * It determines if the price can be used.
     */
    public bool $archived;

    /**
     * The last time the price was pulled from the connection.
     */
    public ?\DateTimeInterface $pullTime;

    /**
     * The last time the price was pushed to the connection.
     */
    public ?\DateTimeInterface $pushTime;

    /**
     * The price view.
     */
    public string $view;

    /**
     * The creation time of the price.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the price.
     */
    public \DateTimeInterface $updateTime;

    /**
     * The price is dependent on the quantity.
     */
    public ?PriceEmptyPrice $empty;

    /**
     * The price is fixed per quantity.
     */
    public ?PriceFixedPrice $fixed;

    /**
     * The price is dependent on the quantity.
     */
    public ?PriceTieredPrice $tiered;

    public function __construct(
        ?string $id = null,
        ?Connection $connection = null,
        ?string $externalId = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?string $currencyCode = null,
        ?string $billingMode = null,
        ?Interval $interval = null,
        ?string $displayName = null,
        ?Product $product = null,
        ?bool $archived = null,
        ?\DateTimeInterface $pullTime = null,
        ?\DateTimeInterface $pushTime = null,
        ?string $view = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
        ?PriceEmptyPrice $empty = null,
        ?PriceFixedPrice $fixed = null,
        ?PriceTieredPrice $tiered = null,
    ) {
        $this->id = $id ?? '';
        $this->connection = $connection ?? null;
        $this->externalId = $externalId ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->currencyCode = $currencyCode ?? '';
        $this->billingMode = $billingMode ?? '';
        $this->interval = $interval ?? null;
        $this->displayName = $displayName ?? null;
        $this->product = $product ?? null;
        $this->archived = $archived ?? false;
        $this->pullTime = $pullTime ?? null;
        $this->pushTime = $pushTime ?? null;
        $this->view = $view ?? '';
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->empty = $empty ?? null;
        $this->fixed = $fixed ?? null;
        $this->tiered = $tiered ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'connection' => $this->connection,
            'externalId' => $this->externalId,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'currencyCode' => $this->currencyCode,
            'billingMode' => $this->billingMode,
            'interval' => $this->interval,
            'displayName' => $this->displayName,
            'product' => $this->product,
            'archived' => $this->archived,
            'pullTime' => Util::encodeDateTime($this->pullTime),
            'pushTime' => Util::encodeDateTime($this->pushTime),
            'view' => $this->view,
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
            'empty' => $this->empty,
            'fixed' => $this->fixed,
            'tiered' => $this->tiered,
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
            $data->{'view'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'empty'}) ? PriceEmptyPrice::jsonUnserialize($data->{'empty'}) : null,
            isset($data->{'fixed'}) ? PriceFixedPrice::jsonUnserialize($data->{'fixed'}) : null,
            isset($data->{'tiered'}) ? PriceTieredPrice::jsonUnserialize($data->{'tiered'}) : null,
        );
    }
}
