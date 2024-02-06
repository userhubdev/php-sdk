<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The Auth0 connection data.
 */
class Auth0Connection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The Auth0 domain.
     */
    public string $domain;

    /**
     * The Auth0 client ID.
     */
    public string $clientId;

    /**
     * The Auth0 client secret.
     */
    public string $clientSecret;

    public function __construct(
        null|string $domain = null,
        null|string $clientId = null,
        null|string $clientSecret = null,
    ) {
        $this->domain = $domain ?? '';
        $this->clientId = $clientId ?? '';
        $this->clientSecret = $clientSecret ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'domain' => isset($this->domain) ? $this->domain : null,
            'clientId' => isset($this->clientId) ? $this->clientId : null,
            'clientSecret' => isset($this->clientSecret) ? $this->clientSecret : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Auth0Connection(
            isset($data->{'domain'}) ? $data->{'domain'} : null,
            isset($data->{'clientId'}) ? $data->{'clientId'} : null,
            isset($data->{'clientSecret'}) ? $data->{'clientSecret'} : null,
        );
    }
}
