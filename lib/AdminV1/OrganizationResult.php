<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\ApiV1\Status;
use UserHub\Internal\JsonUnserializable;

/**
 * Result wrapper for an organization.
 */
final class OrganizationResult implements \JsonSerializable, JsonUnserializable
{
    /**
     * The organization.
     */
    public ?Organization $organization;

    /**
     * The organization error.
     */
    public ?Status $error;

    public function __construct(
        ?Organization $organization = null,
        ?Status $error = null,
    ) {
        $this->organization = $organization ?? null;
        $this->error = $error ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organization' => $this->organization ?? null,
            'error' => $this->error ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'organization'}) ? Organization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'error'}) ? Status::jsonUnserialize($data->{'error'}) : null,
        );
    }
}
