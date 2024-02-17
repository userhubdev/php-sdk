<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The event.
 */
class Event implements \JsonSerializable, JsonUnserializable
{
    /**
     * The event identifier.
     */
    public string $id;

    /**
     * The event time.
     */
    public \DateTimeInterface $time;

    /**
     * The event type.
     */
    public string $type;

    /**
     * The `flows.changed` data.
     */
    public null|\UserHub\EventsV1\FlowsChanged $flowsChanged;

    /**
     * The `members.changed` data.
     */
    public null|\UserHub\EventsV1\MembersChanged $membersChanged;

    /**
     * The `organizations.changed` data.
     */
    public null|\UserHub\EventsV1\OrganizationsChanged $organizationsChanged;

    /**
     * The `subscriptions.changed` data.
     */
    public null|\UserHub\EventsV1\SubscriptionsChanged $subscriptionsChanged;

    /**
     * The `users.changed` data.
     */
    public null|\UserHub\EventsV1\UsersChanged $usersChanged;

    public function __construct(
        null|string $id = null,
        null|\DateTimeInterface $time = null,
        null|string $type = null,
        null|FlowsChanged $flowsChanged = null,
        null|MembersChanged $membersChanged = null,
        null|OrganizationsChanged $organizationsChanged = null,
        null|SubscriptionsChanged $subscriptionsChanged = null,
        null|UsersChanged $usersChanged = null,
    ) {
        $this->id = $id ?? '';
        $this->time = $time ?? Util::emptyDateTime();
        $this->type = $type ?? '';
        $this->flowsChanged = $flowsChanged ?? null;
        $this->membersChanged = $membersChanged ?? null;
        $this->organizationsChanged = $organizationsChanged ?? null;
        $this->subscriptionsChanged = $subscriptionsChanged ?? null;
        $this->usersChanged = $usersChanged ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'time' => isset($this->time) ? Util::encodeDateTime($this->time) : null,
            'type' => $this->type ?? null,
            'flowsChanged' => $this->flowsChanged ?? null,
            'membersChanged' => $this->membersChanged ?? null,
            'organizationsChanged' => $this->organizationsChanged ?? null,
            'subscriptionsChanged' => $this->subscriptionsChanged ?? null,
            'usersChanged' => $this->usersChanged ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'id'} ?? null,
            isset($data->{'time'}) ? Util::decodeDateTime($data->{'time'}) : null,
            $data->{'type'} ?? null,
            isset($data->{'flowsChanged'}) ? FlowsChanged::jsonUnserialize($data->{'flowsChanged'}) : null,
            isset($data->{'membersChanged'}) ? MembersChanged::jsonUnserialize($data->{'membersChanged'}) : null,
            isset($data->{'organizationsChanged'}) ? OrganizationsChanged::jsonUnserialize($data->{'organizationsChanged'}) : null,
            isset($data->{'subscriptionsChanged'}) ? SubscriptionsChanged::jsonUnserialize($data->{'subscriptionsChanged'}) : null,
            isset($data->{'usersChanged'}) ? UsersChanged::jsonUnserialize($data->{'usersChanged'}) : null,
        );
    }
}
