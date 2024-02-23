<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * This defines the upgrade/downgrade paths for a plan group.
 */
final class PlanGroupChangePath implements \JsonSerializable, JsonUnserializable
{
    /**
     * The target plan group for this change path.
     */
    public null|PlanGroup $target;

    /**
     * Whether the change is considered an upgrade or
     * a downgrade.
     */
    public string $direction;

    /**
     * The visibility of the change path.
     */
    public string $visibility;

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
        $this->direction = $direction ?? '';
        $this->visibility = $visibility ?? '';
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'target' => $this->target ?? null,
            'direction' => $this->direction ?? null,
            'visibility' => $this->visibility ?? null,
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
            isset($data->{'target'}) ? PlanGroup::jsonUnserialize($data->{'target'}) : null,
            $data->{'direction'} ?? null,
            $data->{'visibility'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
