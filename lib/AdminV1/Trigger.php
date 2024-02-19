<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A trigger is a way to run connection functionality when specific events
 * occur.
 */
class Trigger implements \JsonSerializable, JsonUnserializable
{
    /**
     * The connection.
     */
    public null|Connection $connection;

    /**
     * The event type.
     */
    public string $eventType;

    /**
     * The creation time of the trigger.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the trigger.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|Connection $connection = null,
        null|string $eventType = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->connection = $connection ?? null;
        $this->eventType = $eventType ?? '';
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'connection' => $this->connection ?? null,
            'eventType' => $this->eventType ?? null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            $data->{'eventType'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
