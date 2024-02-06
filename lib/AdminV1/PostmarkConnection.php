<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\CommonV1\Email;
use UserHub\Internal\JsonUnserializable;

/**
 * The Postmark specific connection data.
 */
class PostmarkConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The Postmark server token (e.g. `942faf79-bf10-4dc1-830a-dc7943f43f35`).
     */
    public string $serverToken;

    /**
     * The Postmark server ID.
     *
     * This is automatically populated when the server token is updated.
     */
    public null|string $serverId;

    /**
     * The from email address.
     *
     * The Postmark account must be allowed to send from this email
     * address.
     */
    public null|\UserHub\CommonV1\Email $from;

    /**
     * The reply to email address.
     */
    public null|\UserHub\CommonV1\Email $replyTo;

    /**
     * The allowed email list.
     *
     * @var string[]
     */
    public array $allowedEmails;

    public function __construct(
        null|string $serverToken = null,
        null|string $serverId = null,
        null|Email $from = null,
        null|Email $replyTo = null,
        null|array $allowedEmails = null,
    ) {
        $this->serverToken = $serverToken ?? '';
        $this->serverId = $serverId ?? null;
        $this->from = $from ?? null;
        $this->replyTo = $replyTo ?? null;
        $this->allowedEmails = $allowedEmails ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'serverToken' => isset($this->serverToken) ? $this->serverToken : null,
            'serverId' => isset($this->serverId) ? $this->serverId : null,
            'from' => isset($this->from) ? $this->from : null,
            'replyTo' => isset($this->replyTo) ? $this->replyTo : null,
            'allowedEmails' => isset($this->allowedEmails) ? $this->allowedEmails : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new PostmarkConnection(
            isset($data->{'serverToken'}) ? $data->{'serverToken'} : null,
            isset($data->{'serverId'}) ? $data->{'serverId'} : null,
            isset($data->{'from'}) ? Email::jsonUnserialize($data->{'from'}) : null,
            isset($data->{'replyTo'}) ? Email::jsonUnserialize($data->{'replyTo'}) : null,
            isset($data->{'allowedEmails'}) ? $data->{'allowedEmails'} : null,
        );
    }
}
