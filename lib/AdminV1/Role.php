<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

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

    /**
     * Whether the role is the default for the tenant.
     */
    public null|bool $default;

    /**
     * The archived status of the role.
     */
    public null|bool $archived;

    /**
     * The creation time of the role.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the role.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $type = null,
        null|string $description = null,
        null|array $permissionSets = null,
        null|bool $default = null,
        null|bool $archived = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? '';
        $this->displayName = $displayName ?? '';
        $this->type = $type ?? '';
        $this->description = $description ?? null;
        $this->permissionSets = $permissionSets ?? [];
        $this->default = $default ?? null;
        $this->archived = $archived ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'uniqueId' => isset($this->uniqueId) ? $this->uniqueId : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'type' => isset($this->type) ? $this->type : null,
            'description' => isset($this->description) ? $this->description : null,
            'permissionSets' => isset($this->permissionSets) ? $this->permissionSets : null,
            'default' => isset($this->default) ? $this->default : null,
            'archived' => isset($this->archived) ? $this->archived : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new Role(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'uniqueId'}) ? $data->{'uniqueId'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'type'}) ? $data->{'type'} : null,
            isset($data->{'description'}) ? $data->{'description'} : null,
            isset($data->{'permissionSets'}) ? $data->{'permissionSets'} : null,
            isset($data->{'default'}) ? $data->{'default'} : null,
            isset($data->{'archived'}) ? $data->{'archived'} : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
