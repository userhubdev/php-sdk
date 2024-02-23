<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The request associated with event.
 */
final class EventRequest implements \JsonSerializable, JsonUnserializable
{
    /**
     * The IP address of the client/user.
     *
     * It's very likely this is the IP address of the
     * API client and not the end-user.
     */
    public null|string $ipAddress;

    /**
     * The trace ID associated with the request.
     */
    public null|string $traceId;

    public function __construct(
        null|string $ipAddress = null,
        null|string $traceId = null,
    ) {
        $this->ipAddress = $ipAddress ?? null;
        $this->traceId = $traceId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'ipAddress' => $this->ipAddress ?? null,
            'traceId' => $this->traceId ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'ipAddress'} ?? null,
            $data->{'traceId'} ?? null,
        );
    }
}
