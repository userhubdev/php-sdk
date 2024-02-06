<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Plan group revisions track the configuration options for a plan group.
 */
class PlanGroupRevision implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the plan group revision.
     */
    public string $id;

    /**
     * The default status of the revision.
     *
     * When this is true, the revision will be used as the default when not
     * explicitly specified.
     */
    public bool $default;

    /**
     * The supported currency codes (e.g. `USD`).
     *
     * @var string[]
     */
    public array $currencyCodes;

    /**
     * The plans associated with plan group revision.
     *
     * @var \UserHub\AdminV1\PlanGroupRevisionPlan[]
     */
    public array $plans;

    /**
     * The items associated with plan group revision.
     *
     * @var \UserHub\AdminV1\PlanGroupRevisionItem[]
     */
    public array $items;

    /**
     * Whether the revision has been committed.
     *
     * After the revision has been committed, it is available for use, but
     * can no longer be edited.
     */
    public null|bool $committed;

    /**
     * The tags associated with the revision.
     *
     * Tags are restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * A revision is limited to 10 tags.
     *
     * @var string[]
     */
    public array $tags;

    /**
     * The revised plan group revision identifier.
     *
     * This allows you to track the revision lineage.
     */
    public null|string $sourceRevisionId;

    /**
     * The creation time of the plan group revision.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the plan group revision.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|string $id = null,
        null|bool $default = null,
        null|array $currencyCodes = null,
        null|array $plans = null,
        null|array $items = null,
        null|bool $committed = null,
        null|array $tags = null,
        null|string $sourceRevisionId = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->default = $default ?? false;
        $this->currencyCodes = $currencyCodes ?? [];
        $this->plans = $plans ?? [];
        $this->items = $items ?? [];
        $this->committed = $committed ?? null;
        $this->tags = $tags ?? [];
        $this->sourceRevisionId = $sourceRevisionId ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => isset($this->id) ? $this->id : null,
            'default' => isset($this->default) ? $this->default : null,
            'currencyCodes' => isset($this->currencyCodes) ? $this->currencyCodes : null,
            'plans' => isset($this->plans) ? $this->plans : null,
            'items' => isset($this->items) ? $this->items : null,
            'committed' => isset($this->committed) ? $this->committed : null,
            'tags' => isset($this->tags) ? $this->tags : null,
            'sourceRevisionId' => isset($this->sourceRevisionId) ? $this->sourceRevisionId : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PlanGroupRevision(
            isset($data->{'id'}) ? $data->{'id'} : null,
            isset($data->{'default'}) ? $data->{'default'} : null,
            isset($data->{'currencyCodes'}) ? $data->{'currencyCodes'} : null,
            isset($data->{'plans'}) ? Util::mapArray($data->{'plans'}, [PlanGroupRevisionPlan::class, 'jsonUnserialize']) : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [PlanGroupRevisionItem::class, 'jsonUnserialize']) : null,
            isset($data->{'committed'}) ? $data->{'committed'} : null,
            isset($data->{'tags'}) ? $data->{'tags'} : null,
            isset($data->{'sourceRevisionId'}) ? $data->{'sourceRevisionId'} : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
