<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The Google Cloud Identity Platform/Firebase specific connection data.
 */
final class GoogleCloudIdentityPlatformConnection implements \JsonSerializable, JsonUnserializable
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
    public ?string $projectId;

    public function __construct(
        ?string $credentials = null,
        ?string $projectId = null,
    ) {
        $this->credentials = $credentials ?? '';
        $this->projectId = $projectId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'credentials' => $this->credentials ?? null,
            'projectId' => $this->projectId ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'credentials'} ?? null,
            $data->{'projectId'} ?? null,
        );
    }
}
