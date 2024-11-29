<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Event describes a service a tenant provides. Multiple
 * events can be multiple and sold using a plan.
 */
final class Event implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the event.
     */
    public string $id;

    /**
     * The type of the event.
     */
    public string $type;

    /**
     * The time of the event.
     */
    public \DateTimeInterface $time;

    /**
     * The entity associated with the event.
     */
    public ?EventEntity $entity;

    /**
     * The connection associated with the event.
     */
    public ?EventConnection $connection;

    /**
     * The organization associated with the event.
     */
    public ?EventOrganization $organization;

    /**
     * The user associated with the event.
     */
    public ?EventUser $user;

    /**
     * The API key associated with the event.
     */
    public ?EventApiKey $apiKey;

    /**
     * The actor associated with the event.
     */
    public ?EventActor $actor;

    /**
     * The request associated with the event.
     */
    public ?EventRequest $request;

    public function __construct(
        ?string $id = null,
        ?string $type = null,
        ?\DateTimeInterface $time = null,
        ?EventEntity $entity = null,
        ?EventConnection $connection = null,
        ?EventOrganization $organization = null,
        ?EventUser $user = null,
        ?EventApiKey $apiKey = null,
        ?EventActor $actor = null,
        ?EventRequest $request = null,
    ) {
        $this->id = $id ?? '';
        $this->type = $type ?? '';
        $this->time = $time ?? Util::emptyDateTime();
        $this->entity = $entity ?? null;
        $this->connection = $connection ?? null;
        $this->organization = $organization ?? null;
        $this->user = $user ?? null;
        $this->apiKey = $apiKey ?? null;
        $this->actor = $actor ?? null;
        $this->request = $request ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'time' => isset($this->time) ? Util::encodeDateTime($this->time) : null,
            'entity' => $this->entity ?? null,
            'connection' => $this->connection ?? null,
            'organization' => $this->organization ?? null,
            'user' => $this->user ?? null,
            'apiKey' => $this->apiKey ?? null,
            'actor' => $this->actor ?? null,
            'request' => $this->request ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            $data->{'type'} ?? null,
            isset($data->{'time'}) ? Util::decodeDateTime($data->{'time'}) : null,
            isset($data->{'entity'}) ? EventEntity::jsonUnserialize($data->{'entity'}) : null,
            isset($data->{'connection'}) ? EventConnection::jsonUnserialize($data->{'connection'}) : null,
            isset($data->{'organization'}) ? EventOrganization::jsonUnserialize($data->{'organization'}) : null,
            isset($data->{'user'}) ? EventUser::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'apiKey'}) ? EventApiKey::jsonUnserialize($data->{'apiKey'}) : null,
            isset($data->{'actor'}) ? EventActor::jsonUnserialize($data->{'actor'}) : null,
            isset($data->{'request'}) ? EventRequest::jsonUnserialize($data->{'request'}) : null,
        );
    }
}
