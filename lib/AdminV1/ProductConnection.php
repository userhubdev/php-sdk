<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A link between a UserHub product and an external product.
 */
final class ProductConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The basic view of the connection.
     */
    public ?Connection $connection;

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
    public ?string $stateReason;

    /**
     * The last time the product was pulled from the connection.
     */
    public ?\DateTimeInterface $pullTime;

    /**
     * The last time the product was pushed to the connection.
     */
    public ?\DateTimeInterface $pushTime;

    /**
     * The creation time of the product connection.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the product connection.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        ?Connection $connection = null,
        ?string $externalId = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?\DateTimeInterface $pullTime = null,
        ?\DateTimeInterface $pushTime = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
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
            'connection' => $this->connection,
            'externalId' => $this->externalId,
            'state' => $this->state,
            'stateReason' => $this->stateReason,
            'pullTime' => Util::encodeDateTime($this->pullTime),
            'pushTime' => Util::encodeDateTime($this->pushTime),
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            $data->{'externalId'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'pushTime'}) ? Util::decodeDateTime($data->{'pushTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
