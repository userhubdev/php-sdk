<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

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
            'domain' => $this->domain ?? null,
            'clientId' => $this->clientId ?? null,
            'clientSecret' => $this->clientSecret ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'domain'} ?? null,
            $data->{'clientId'} ?? null,
            $data->{'clientSecret'} ?? null,
        );
    }
}
