<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for BatchGetOrganizations.
 */
class BatchGetOrganizationsResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The organizations.
     *
     * @var \UserHub\AdminV1\OrganizationResult[]
     */
    public array $organizations;

    public function __construct(
        null|array $organizations = null,
    ) {
        $this->organizations = $organizations ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'organizations' => $this->organizations ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'organizations'}) ? Util::mapArray($data->{'organizations'}, [OrganizationResult::class, 'jsonUnserialize']) : null,
        );
    }
}
