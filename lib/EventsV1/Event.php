<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\EventsV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The event.
 */
final class Event implements \JsonSerializable, JsonUnserializable
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
    public ?FlowsChanged $flowsChanged;

    /**
     * The `members.changed` data.
     */
    public ?MembersChanged $membersChanged;

    /**
     * The `organizations.changed` data.
     */
    public ?OrganizationsChanged $organizationsChanged;

    /**
     * The `subscriptions.changed` data.
     */
    public ?SubscriptionsChanged $subscriptionsChanged;

    /**
     * The `users.changed` data.
     */
    public ?UsersChanged $usersChanged;

    public function __construct(
        ?string $id = null,
        ?\DateTimeInterface $time = null,
        ?string $type = null,
        ?FlowsChanged $flowsChanged = null,
        ?MembersChanged $membersChanged = null,
        ?OrganizationsChanged $organizationsChanged = null,
        ?SubscriptionsChanged $subscriptionsChanged = null,
        ?UsersChanged $usersChanged = null,
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
            'id' => $this->id,
            'time' => Util::encodeDateTime($this->time),
            'type' => $this->type,
            'flowsChanged' => $this->flowsChanged,
            'membersChanged' => $this->membersChanged,
            'organizationsChanged' => $this->organizationsChanged,
            'subscriptionsChanged' => $this->subscriptionsChanged,
            'usersChanged' => $this->usersChanged,
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
