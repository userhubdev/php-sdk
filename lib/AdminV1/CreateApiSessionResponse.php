<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for CreateApiSession.
 */
class CreateApiSessionResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * An authorization token which can be used to access the User API.
     *
     * This should be included in the `Authorization` header with a
     * `Bearer` prefix.
     */
    public string $accessToken;

    /**
     * The expiration time for the session.
     */
    public \DateTimeInterface $expireTime;

    public function __construct(
        null|string $accessToken = null,
        null|\DateTimeInterface $expireTime = null,
    ) {
        $this->accessToken = $accessToken ?? '';
        $this->expireTime = $expireTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'accessToken' => isset($this->accessToken) ? $this->accessToken : null,
            'expireTime' => isset($this->expireTime) ? Util::encodeDateTime($this->expireTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new CreateApiSessionResponse(
            isset($data->{'accessToken'}) ? $data->{'accessToken'} : null,
            isset($data->{'expireTime'}) ? Util::decodeDateTime($data->{'expireTime'}) : null,
        );
    }
}
