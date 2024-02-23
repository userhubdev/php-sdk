<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Product describes a service a tenant provides.
 */
class Product implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the product.
     */
    public string $id;

    /**
     * The client defined unique identifier of the product.
     *
     * It is restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * ID's starting with `pd_` are reserved.
     */
    public null|string $uniqueId;

    /**
     * The customer facing human-readable display name of the product.
     *
     * The maximum length is 200 characters.
     */
    public string $displayName;

    /**
     * The public description of the product.
     *
     * The maximum length is 1000 characters.
     */
    public null|string $description;

    /**
     * Whether the price has been committed.
     *
     * This is automatically set the first time the product is used
     * in a plan.
     */
    public bool $committed;

    /**
     * The archived status of the product.
     *
     * It determines if the product can be activated by self-serve plans.
     */
    public bool $archived;

    /**
     * The connected products.
     *
     * @var \UserHub\AdminV1\ProductConnection[]
     */
    public array $productConnections;

    /**
     * The creation time of the product.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the product.
     */
    public \DateTimeInterface $updateTime;

    public function __construct(
        null|string $id = null,
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $description = null,
        null|bool $committed = null,
        null|bool $archived = null,
        null|array $productConnections = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
        $this->description = $description ?? null;
        $this->committed = $committed ?? false;
        $this->archived = $archived ?? false;
        $this->productConnections = $productConnections ?? [];
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
            'committed' => $this->committed ?? null,
            'archived' => $this->archived ?? null,
            'productConnections' => $this->productConnections ?? null,
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
            $data->{'committed'} ?? null,
            $data->{'archived'} ?? null,
            isset($data->{'productConnections'}) ? Util::mapArray($data->{'productConnections'}, [ProductConnection::class, 'jsonUnserialize']) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
