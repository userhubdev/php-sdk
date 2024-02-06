<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A link between a UserHub product and an external product.
 */
class ProductConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The basic view of the connection.
     */
    public null|\UserHub\AdminV1\Connection $connection;

    /**
     * The external identifier of the connected product.
     */
    public string $externalId;

    /**
     * The status of the connected product.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The last time the product was pulled from the connection.
     */
    public null|\DateTimeInterface $pullTime;

    /**
     * The last time the product was pushed to the connection.
     */
    public null|\DateTimeInterface $pushTime;

    /**
     * The creation time of the product connection.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the product connection.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|Connection $connection = null,
        null|string $externalId = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|\DateTimeInterface $pullTime = null,
        null|\DateTimeInterface $pushTime = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->connection = $connection ?? null;
        $this->externalId = $externalId ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->pullTime = $pullTime ?? null;
        $this->pushTime = $pushTime ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'connection' => isset($this->connection) ? $this->connection : null,
            'externalId' => isset($this->externalId) ? $this->externalId : null,
            'state' => isset($this->state) ? $this->state : null,
            'stateReason' => isset($this->stateReason) ? $this->stateReason : null,
            'pullTime' => isset($this->pullTime) ? Util::encodeDateTime($this->pullTime) : null,
            'pushTime' => isset($this->pushTime) ? Util::encodeDateTime($this->pushTime) : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new ProductConnection(
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            isset($data->{'externalId'}) ? $data->{'externalId'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'stateReason'}) ? $data->{'stateReason'} : null,
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'pushTime'}) ? Util::decodeDateTime($data->{'pushTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
