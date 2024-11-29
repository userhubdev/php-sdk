<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Plan group revisions track the configuration options for a plan group.
 */
final class PlanGroupRevision implements \JsonSerializable, JsonUnserializable
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
     * @var PlanGroupRevisionPlan[]
     */
    public array $plans;

    /**
     * The items associated with plan group revision.
     *
     * @var PlanGroupRevisionItem[]
     */
    public array $items;

    /**
     * Whether the revision has been committed.
     *
     * After the revision has been committed, it is available for use, but
     * can no longer be edited.
     */
    public bool $committed;

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
    public ?string $sourceRevisionId;

    /**
     * The creation time of the plan group revision.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the plan group revision.
     */
    public \DateTimeInterface $updateTime;

    /**
     * @param null|string[]                $currencyCodes
     * @param null|PlanGroupRevisionPlan[] $plans
     * @param null|PlanGroupRevisionItem[] $items
     * @param null|string[]                $tags
     */
    public function __construct(
        ?string $id = null,
        ?bool $default = null,
        ?array $currencyCodes = null,
        ?array $plans = null,
        ?array $items = null,
        ?bool $committed = null,
        ?array $tags = null,
        ?string $sourceRevisionId = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->default = $default ?? false;
        $this->currencyCodes = $currencyCodes ?? [];
        $this->plans = $plans ?? [];
        $this->items = $items ?? [];
        $this->committed = $committed ?? false;
        $this->tags = $tags ?? [];
        $this->sourceRevisionId = $sourceRevisionId ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'default' => $this->default ?? null,
            'currencyCodes' => $this->currencyCodes ?? null,
            'plans' => $this->plans ?? null,
            'items' => $this->items ?? null,
            'committed' => $this->committed ?? null,
            'tags' => $this->tags ?? null,
            'sourceRevisionId' => $this->sourceRevisionId ?? null,
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
            $data->{'default'} ?? null,
            $data->{'currencyCodes'} ?? null,
            isset($data->{'plans'}) ? Util::mapArray($data->{'plans'}, [PlanGroupRevisionPlan::class, 'jsonUnserialize']) : null,
            isset($data->{'items'}) ? Util::mapArray($data->{'items'}, [PlanGroupRevisionItem::class, 'jsonUnserialize']) : null,
            $data->{'committed'} ?? null,
            $data->{'tags'} ?? null,
            $data->{'sourceRevisionId'} ?? null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
