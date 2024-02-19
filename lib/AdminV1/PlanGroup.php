<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Plan group is a container for plan revisions and billing
 * intervals.
 *
 * A plan group would generally describe a tier of plans offered
 * (e.g. Pro) which might contain two options, a monthly and
 * yearly plan.
 */
class PlanGroup implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the plan group.
     */
    public string $id;

    /**
     * The client defined unique identifier of the plan group (e.g. `pro`).
     *
     * It is restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * ID's starting with `pg_r are reserved.
     */
    public null|string $uniqueId;

    /**
     * The customer facing human-readable display name of the plan group.
     *
     * The maximum length is 200 characters.
     */
    public string $displayName;

    /**
     * The admin facing description of the plan group.
     *
     * The maximum length is 1000 characters.
     */
    public null|string $description;

    /**
     * The type of account the plan can be activated for.
     */
    public string $accountType;

    /**
     * The trial settings.
     */
    public null|PlanGroupTrial $trial;

    /**
     * The visibility of the plan group.
     */
    public null|string $visibility;

    /**
     * The archived status of the plan group.
     */
    public null|bool $archived;

    /**
     * The current revision for the plan group.
     */
    public null|PlanGroupRevision $revision;

    /**
     * The creation time of the plan group.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the plan group.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $description = null,
        null|string $accountType = null,
        null|PlanGroupTrial $trial = null,
        null|string $visibility = null,
        null|bool $archived = null,
        null|PlanGroupRevision $revision = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
        $this->description = $description ?? null;
        $this->accountType = $accountType ?? '';
        $this->trial = $trial ?? null;
        $this->visibility = $visibility ?? null;
        $this->archived = $archived ?? null;
        $this->revision = $revision ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'displayName' => $this->displayName ?? null,
            'description' => $this->description ?? null,
            'accountType' => $this->accountType ?? null,
            'trial' => $this->trial ?? null,
            'visibility' => $this->visibility ?? null,
            'archived' => $this->archived ?? null,
            'revision' => $this->revision ?? null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
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
            $data->{'description'} ?? null,
            $data->{'accountType'} ?? null,
            isset($data->{'trial'}) ? PlanGroupTrial::jsonUnserialize($data->{'trial'}) : null,
            $data->{'visibility'} ?? null,
            $data->{'archived'} ?? null,
            isset($data->{'revision'}) ? PlanGroupRevision::jsonUnserialize($data->{'revision'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
