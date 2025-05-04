<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Input message for UpdateJoinOrganizationFlow.
 */
final class UpdateJoinOrganizationFlowInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the role.
     */
    public ?string $roleId;

    public function __construct(
        ?string $roleId = null,
    ) {
        $this->roleId = $roleId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'roleId' => $this->roleId,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'roleId'} ?? null,
        );
    }
}
