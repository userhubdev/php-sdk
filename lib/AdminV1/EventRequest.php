<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The request associated with event.
 */
class EventRequest implements \JsonSerializable, JsonUnserializable
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
            'ipAddress' => isset($this->ipAddress) ? $this->ipAddress : null,
            'traceId' => isset($this->traceId) ? $this->traceId : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new EventRequest(
            isset($data->{'ipAddress'}) ? $data->{'ipAddress'} : null,
            isset($data->{'traceId'}) ? $data->{'traceId'} : null,
        );
    }
}
