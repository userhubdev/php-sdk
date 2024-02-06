<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * This defines the upgrade/downgrade paths for a plan group.
 */
class PlanGroupChangePath implements \JsonSerializable, JsonUnserializable
{
    /**
     * The target plan group for this change path.
     */
    public null|\UserHub\AdminV1\PlanGroup $target;

    /**
     * Whether the change is considered an upgrade or
     * a downgrade.
     */
    public null|string $direction;

    /**
     * The visibility of the change path.
     */
    public null|string $visibility;

    /**
     * The creation time of the plan group change path.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the plan group change path.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|PlanGroup $target = null,
        null|string $direction = null,
        null|string $visibility = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->target = $target ?? null;
        $this->direction = $direction ?? null;
        $this->visibility = $visibility ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'target' => isset($this->target) ? $this->target : null,
            'direction' => isset($this->direction) ? $this->direction : null,
            'visibility' => isset($this->visibility) ? $this->visibility : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PlanGroupChangePath(
            isset($data->{'target'}) ? PlanGroup::jsonUnserialize($data->{'target'}) : null,
            isset($data->{'direction'}) ? $data->{'direction'} : null,
            isset($data->{'visibility'}) ? $data->{'visibility'} : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
