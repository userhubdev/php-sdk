<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A member's role within an organization.
 */
final class Role implements \JsonSerializable, JsonUnserializable
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
    public ?string $description;

    /**
     * The policy that defines how a member is assigned a seat.
     */
    public ?string $seatPolicy;

    /**
     * The additional permissions allowed by the role.
     *
     * @var string[]
     */
    public array $permissionSets;

    /**
     * Whether the role is the default for the tenant.
     */
    public bool $default;

    /**
     * The archived status of the role.
     */
    public bool $archived;

    /**
     * The creation time of the role.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the role.
     */
    public \DateTimeInterface $updateTime;

    /**
     * @param null|string[] $permissionSets
     */
    public function __construct(
        ?string $id = null,
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $type = null,
        ?string $description = null,
        ?string $seatPolicy = null,
        ?array $permissionSets = null,
        ?bool $default = null,
        ?bool $archived = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? '';
        $this->displayName = $displayName ?? '';
        $this->type = $type ?? '';
        $this->description = $description ?? null;
        $this->seatPolicy = $seatPolicy ?? null;
        $this->permissionSets = $permissionSets ?? [];
        $this->default = $default ?? false;
        $this->archived = $archived ?? false;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id,
            'uniqueId' => $this->uniqueId,
            'displayName' => $this->displayName,
            'type' => $this->type,
            'description' => $this->description,
            'seatPolicy' => $this->seatPolicy,
            'permissionSets' => $this->permissionSets,
            'default' => $this->default,
            'archived' => $this->archived,
            'createTime' => Util::encodeDateTime($this->createTime),
            'updateTime' => Util::encodeDateTime($this->updateTime),
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
            $data->{'seatPolicy'} ?? null,
            $data->{'permissionSets'} ?? null,
            $data->{'default'} ?? null,
            $data->{'archived'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
