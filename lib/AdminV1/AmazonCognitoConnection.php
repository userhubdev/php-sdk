<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The Amazon Cognito connection data.
 */
final class AmazonCognitoConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The Amazon Cognito user pool ID.
     */
    public string $userPoolId;

    /**
     * The Amazon region.
     */
    public string $region;

    /**
     * The Amazon access key ID.
     */
    public string $accessKeyId;

    /**
     * The Amazon access key secret.
     */
    public string $accessKeySecret;

    /**
     * OpenID Connect (OIDC) configuration.
     *
     * If configured, this can be used instead of implementing a
     * Portal callback.
     */
    public ?OidcConfig $oidc;

    public function __construct(
        ?string $userPoolId = null,
        ?string $region = null,
        ?string $accessKeyId = null,
        ?string $accessKeySecret = null,
        ?OidcConfig $oidc = null,
    ) {
        $this->userPoolId = $userPoolId ?? '';
        $this->region = $region ?? '';
        $this->accessKeyId = $accessKeyId ?? '';
        $this->accessKeySecret = $accessKeySecret ?? '';
        $this->oidc = $oidc ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'userPoolId' => $this->userPoolId ?? null,
            'region' => $this->region ?? null,
            'accessKeyId' => $this->accessKeyId ?? null,
            'accessKeySecret' => $this->accessKeySecret ?? null,
            'oidc' => $this->oidc ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'userPoolId'} ?? null,
            $data->{'region'} ?? null,
            $data->{'accessKeyId'} ?? null,
            $data->{'accessKeySecret'} ?? null,
            isset($data->{'oidc'}) ? OidcConfig::jsonUnserialize($data->{'oidc'}) : null,
        );
    }
}
