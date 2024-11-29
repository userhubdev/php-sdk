<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * An integration that connects your tenant to an external system.
 */
final class Connection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The system-assigned identifier of the connection.
     */
    public string $id;

    /**
     * The client defined unique identifier of the connection.
     *
     * It is restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * ID's starting with `conn_` are reserved.
     */
    public ?string $uniqueId;

    /**
     * The human-readable display name of the connection.
     *
     * The maximum length is 200 characters.
     */
    public string $displayName;

    /**
     * The current status of the connection.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public ?string $stateReason;

    /**
     * The connection type.
     */
    public string $type;

    /**
     * The delegated connection.
     */
    public ?ConnectionDelegate $delegate;

    /**
     * The connection providers.
     *
     * @var ConnectionProvider[]
     */
    public array $providers;

    /**
     * The creation time of the connection.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the connection.
     */
    public \DateTimeInterface $updateTime;

    /**
     * The Auth0 connection data.
     */
    public ?Auth0Connection $auth0;

    /**
     * The builtin email configuration data.
     */
    public ?BuiltinEmailConnection $builtinEmail;

    /**
     * The Google Cloud Identity Platform (Firebase Auth) connection.
     */
    public ?GoogleCloudIdentityPlatformConnection $googleCloudIdentityPlatform;

    /**
     * The Postmark configuration data.
     */
    public ?PostmarkConnection $postmark;

    /**
     * The Stripe billing configuration data.
     */
    public ?StripeConnection $stripe;

    /**
     * The webhooks configuration data.
     */
    public ?WebhookConnection $webhook;

    /**
     * @param null|ConnectionProvider[] $providers
     */
    public function __construct(
        ?string $id = null,
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $state = null,
        ?string $stateReason = null,
        ?string $type = null,
        ?ConnectionDelegate $delegate = null,
        ?array $providers = null,
        ?\DateTimeInterface $createTime = null,
        ?\DateTimeInterface $updateTime = null,
        ?Auth0Connection $auth0 = null,
        ?BuiltinEmailConnection $builtinEmail = null,
        ?GoogleCloudIdentityPlatformConnection $googleCloudIdentityPlatform = null,
        ?PostmarkConnection $postmark = null,
        ?StripeConnection $stripe = null,
        ?WebhookConnection $webhook = null,
    ) {
        $this->id = $id ?? '';
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? '';
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->type = $type ?? '';
        $this->delegate = $delegate ?? null;
        $this->providers = $providers ?? [];
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
        $this->auth0 = $auth0 ?? null;
        $this->builtinEmail = $builtinEmail ?? null;
        $this->googleCloudIdentityPlatform = $googleCloudIdentityPlatform ?? null;
        $this->postmark = $postmark ?? null;
        $this->stripe = $stripe ?? null;
        $this->webhook = $webhook ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'id' => $this->id ?? null,
            'uniqueId' => $this->uniqueId ?? null,
            'displayName' => $this->displayName ?? null,
            'state' => $this->state ?? null,
            'stateReason' => $this->stateReason ?? null,
            'type' => $this->type ?? null,
            'delegate' => $this->delegate ?? null,
            'providers' => $this->providers ?? null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
            'auth0' => $this->auth0 ?? null,
            'builtinEmail' => $this->builtinEmail ?? null,
            'googleCloudIdentityPlatform' => $this->googleCloudIdentityPlatform ?? null,
            'postmark' => $this->postmark ?? null,
            'stripe' => $this->stripe ?? null,
            'webhook' => $this->webhook ?? null,
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
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            $data->{'type'} ?? null,
            isset($data->{'delegate'}) ? ConnectionDelegate::jsonUnserialize($data->{'delegate'}) : null,
            isset($data->{'providers'}) ? Util::mapArray($data->{'providers'}, [ConnectionProvider::class, 'jsonUnserialize']) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
            isset($data->{'auth0'}) ? Auth0Connection::jsonUnserialize($data->{'auth0'}) : null,
            isset($data->{'builtinEmail'}) ? BuiltinEmailConnection::jsonUnserialize($data->{'builtinEmail'}) : null,
            isset($data->{'googleCloudIdentityPlatform'}) ? GoogleCloudIdentityPlatformConnection::jsonUnserialize($data->{'googleCloudIdentityPlatform'}) : null,
            isset($data->{'postmark'}) ? PostmarkConnection::jsonUnserialize($data->{'postmark'}) : null,
            isset($data->{'stripe'}) ? StripeConnection::jsonUnserialize($data->{'stripe'}) : null,
            isset($data->{'webhook'}) ? WebhookConnection::jsonUnserialize($data->{'webhook'}) : null,
        );
    }
}
