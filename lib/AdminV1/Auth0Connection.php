<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The Auth0 connection data.
 */
final class Auth0Connection implements \JsonSerializable, JsonUnserializable
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

    /**
     * OpenID Connect (OIDC) configuration.
     *
     * If configured, this can be used instead of implementing a
     * Portal callback.
     */
    public ?OidcConfig $oidc;

    public function __construct(
        ?string $domain = null,
        ?string $clientId = null,
        ?string $clientSecret = null,
        ?OidcConfig $oidc = null,
    ) {
        $this->domain = $domain ?? '';
        $this->clientId = $clientId ?? '';
        $this->clientSecret = $clientSecret ?? '';
        $this->oidc = $oidc ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'domain' => $this->domain,
            'clientId' => $this->clientId,
            'clientSecret' => $this->clientSecret,
            'oidc' => $this->oidc,
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
            isset($data->{'oidc'}) ? OidcConfig::jsonUnserialize($data->{'oidc'}) : null,
        );
    }
}
