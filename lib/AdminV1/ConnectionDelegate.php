<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The delegated connection.
 */
class ConnectionDelegate implements \JsonSerializable, JsonUnserializable
{
    /**
     * The delegated connection identifier.
     */
    public string $id;

    /**
     * The client defined unique identifier of the delegated connection.
     */
    public null|string $uniqueId;

    /**
     * The human-readable display name of the delegated connection.
     */
    public string $displayName;

    /**
     * The current status of the delegated connection.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The delegated connection type.
     */
    public string $type;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $type = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->type = $type ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'uniqueId' => isset($this->uniqueId) ? $this->uniqueId : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'state' => isset($this->state) ? $this->state : null,
            'stateReason' => isset($this->stateReason) ? $this->stateReason : null,
            'type' => isset($this->type) ? $this->type : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new ConnectionDelegate(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'uniqueId'}) ? $data->{'uniqueId'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'state'}) ? $data->{'state'} : null,
            isset($data->{'stateReason'}) ? $data->{'stateReason'} : null,
            isset($data->{'type'}) ? $data->{'type'} : null,
        );
    }
}
