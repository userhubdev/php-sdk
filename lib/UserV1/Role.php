<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * A member's role within an organization.
 */
class Role implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the role.
     */
    public string $id;

    /**
     * The client defined unique identifier of the role.
     *
     * It is restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * ID's starting with `role_` are reserved.
     */
    public string $uniqueId;

    /**
     * The human-readable display name of the role.
     */
    public string $displayName;

    /**
     * The role type.
     */
    public string $type;

    /**
     * The description of the role.
     *
     * The maximum length is 1000 characters.
     */
    public null|string $description;

    /**
     * The additional permissions allowed by the role.
     *
     * @var string[]
     */
    public array $permissionSets;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $type = null,
        null|string $description = null,
        null|array $permissionSets = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? '';
        $this->displayName = $displayName ?? '';
        $this->type = $type ?? '';
        $this->description = $description ?? null;
        $this->permissionSets = $permissionSets ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'displayName' => $this->displayName ?? null,
            'type' => $this->type ?? null,
            'description' => $this->description ?? null,
            'permissionSets' => $this->permissionSets ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'uniqueId'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'type'} ?? null,
            $data->{'description'} ?? null,
            $data->{'permissionSets'} ?? null,
        );
    }
}
