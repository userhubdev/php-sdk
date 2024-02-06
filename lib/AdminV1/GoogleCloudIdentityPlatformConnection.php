<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The Google Cloud Identity Platform/Firebase specific connection data.
 */
class GoogleCloudIdentityPlatformConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The service account key in JSON format.
     */
    public string $credentials;

    /**
     * The Google Cloud Identity Platform/Firebase project ID.
     *
     * This will default to the project ID in the service account key if
     * not specified.
     */
    public null|string $projectId;

    public function __construct(
        null|string $credentials = null,
        null|string $projectId = null,
    ) {
        $this->credentials = $credentials ?? '';
        $this->projectId = $projectId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'credentials' => isset($this->credentials) ? $this->credentials : null,
            'projectId' => isset($this->projectId) ? $this->projectId : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new GoogleCloudIdentityPlatformConnection(
            isset($data->{'credentials'}) ? $data->{'credentials'} : null,
            isset($data->{'projectId'}) ? $data->{'projectId'} : null,
        );
    }
}
