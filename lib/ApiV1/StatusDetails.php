<?php

// Code generated. DO NOT EDIT.

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The API error with the fields that already exist
 * in Status removed.
 */
class StatusDetails implements \JsonSerializable, JsonUnserializable
{
    /**
     * A reason code for the error (e.g. `PENDING_DELETION`).
     */
    public null|string $reason;

    /**
     * The parameter path related to the error (e.g. `member.userId`).
     */
    public null|string $param;

    /**
     * Additional metadata related to the error.
     *
     * @var object<string, string>
     */
    public object $metadata;

    public function __construct(
        null|string $reason = null,
        null|string $param = null,
        null|object $metadata = null,
    ) {
        $this->reason = $reason ?? null;
        $this->param = $param ?? null;
        $this->metadata = $metadata ?? (object) [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'reason' => isset($this->reason) ? $this->reason : null,
            'param' => isset($this->param) ? $this->param : null,
            'metadata' => isset($this->metadata) ? $this->metadata : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new StatusDetails(
            isset($data->{'reason'}) ? $data->{'reason'} : null,
            isset($data->{'param'}) ? $data->{'param'} : null,
            isset($data->{'metadata'}) ? $data->{'metadata'} : null,
        );
    }
}
