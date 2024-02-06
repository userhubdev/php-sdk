<?php

// Code generated. DO NOT EDIT.

namespace UserHub\OperationsV1;

use UserHub\CommonV1\Any;
use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Operation is a long running background task.
 */
class Operation implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the operation.
     */
    public string $id;

    /**
     * If the value is `false`, it means the operation is still in progress.
     * If `true`, the operation is completed, and either `error` or `response` is
     * available.
     */
    public bool $done;

    /**
     * The error result of the operation in case of failure.
     */
    public null|\UserHub\OperationsV1\OperationError $error;

    /**
     * The normal response of the operation in case of success.
     */
    public null|\UserHub\CommonV1\Any $response;

    /**
     * The creation time of the operation.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the operation.
     */
    public \DateTimeInterface $updateTime;

    /**
     * The deletion time of the operation.
     */
    public null|\DateTimeInterface $deleteTime;

    public function __construct(
        null|string $id = null,
        null|bool $done = null,
        null|OperationError $error = null,
        null|Any $response = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
        null|\DateTimeInterface $deleteTime = null,
    ) {
        $this->id = $id ?? '';
        $this->done = $done ?? false;
        $this->error = $error ?? null;
        $this->response = $response ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->deleteTime = $deleteTime ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'done' => isset($this->done) ? $this->done : null,
            'error' => isset($this->error) ? $this->error : null,
            'response' => isset($this->response) ? $this->response : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
            'deleteTime' => isset($this->deleteTime) ? Util::encodeDateTime($this->deleteTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Operation(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'done'}) ? $data->{'done'} : null,
            isset($data->{'error'}) ? OperationError::jsonUnserialize($data->{'error'}) : null,
            isset($data->{'response'}) ? Any::jsonUnserialize($data->{'response'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'deleteTime'}) ? Util::decodeDateTime($data->{'deleteTime'}) : null,
        );
    }
}
