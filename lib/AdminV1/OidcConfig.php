<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * OpenID Connect (OIDC) configuration.
 */
final class OidcConfig implements \JsonSerializable, JsonUnserializable
{
    /**
     * The issuer URL.
     */
    public string $issuerUrl;

    /**
     * The client ID.
     */
    public string $clientId;

    /**
     * The client secret.
     */
    public string $clientSecret;

    public function __construct(
        ?string $issuerUrl = null,
        ?string $clientId = null,
        ?string $clientSecret = null,
    ) {
        $this->issuerUrl = $issuerUrl ?? '';
        $this->clientId = $clientId ?? '';
        $this->clientSecret = $clientSecret ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'issuerUrl' => $this->issuerUrl,
            'clientId' => $this->clientId,
            'clientSecret' => $this->clientSecret,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'issuerUrl'} ?? null,
            $data->{'clientId'} ?? null,
            $data->{'clientSecret'} ?? null,
        );
    }
}
