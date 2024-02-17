<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The session details.
 */
class Session implements \JsonSerializable, JsonUnserializable
{
    /**
     * The authenticated user.
     *
     * This will be null if the user is not authenticated.
     */
    public null|\UserHub\UserV1\User $user;

    /**
     * The authenticated user's organization memberships.
     *
     * @var \UserHub\UserV1\Membership[]
     */
    public array $memberships;

    /**
     * The user's default active individual subscription.
     *
     * See memberships for organization subscription and
     * seat information.
     */
    public null|\UserHub\UserV1\AccountSubscription $subscription;

    /**
     * The expiration time for the current session.
     */
    public null|\DateTimeInterface $expireTime;

    /**
     * The scopes available in the current session.
     *
     * @var string[]
     */
    public array $scopes;

    public function __construct(
        null|User $user = null,
        null|array $memberships = null,
        null|AccountSubscription $subscription = null,
        null|\DateTimeInterface $expireTime = null,
        null|array $scopes = null,
    ) {
        $this->user = $user ?? null;
        $this->memberships = $memberships ?? [];
        $this->subscription = $subscription ?? null;
        $this->expireTime = $expireTime ?? null;
        $this->scopes = $scopes ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'user' => $this->user ?? null,
            'memberships' => $this->memberships ?? null,
            'subscription' => $this->subscription ?? null,
            'expireTime' => isset($this->expireTime) ? Util::encodeDateTime($this->expireTime) : null,
            'scopes' => $this->scopes ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'user'}) ? User::jsonUnserialize($data->{'user'}) : null,
            isset($data->{'memberships'}) ? Util::mapArray($data->{'memberships'}, [Membership::class, 'jsonUnserialize']) : null,
            isset($data->{'subscription'}) ? AccountSubscription::jsonUnserialize($data->{'subscription'}) : null,
            isset($data->{'expireTime'}) ? Util::decodeDateTime($data->{'expireTime'}) : null,
            $data->{'scopes'} ?? null,
        );
    }
}
