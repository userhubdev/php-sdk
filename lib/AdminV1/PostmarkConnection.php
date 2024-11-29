<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\CommonV1\Email;
use UserHub\Internal\JsonUnserializable;

/**
 * The Postmark specific connection data.
 */
final class PostmarkConnection implements \JsonSerializable, JsonUnserializable
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
    public string $serverId;

    /**
     * The from email address.
     *
     * The Postmark account must be allowed to send from this email
     * address.
     */
    public ?Email $from;

    /**
     * The reply to email address.
     */
    public ?Email $replyTo;

    /**
     * The allowed email list.
     *
     * @var string[]
     */
    public array $allowedEmails;

    /**
     * @param null|string[] $allowedEmails
     */
    public function __construct(
        ?string $serverToken = null,
        ?string $serverId = null,
        ?Email $from = null,
        ?Email $replyTo = null,
        ?array $allowedEmails = null,
    ) {
        $this->serverToken = $serverToken ?? '';
        $this->serverId = $serverId ?? '';
        $this->from = $from ?? null;
        $this->replyTo = $replyTo ?? null;
        $this->allowedEmails = $allowedEmails ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'serverToken' => $this->serverToken ?? null,
            'serverId' => $this->serverId ?? null,
            'from' => $this->from ?? null,
            'replyTo' => $this->replyTo ?? null,
            'allowedEmails' => $this->allowedEmails ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'serverToken'} ?? null,
            $data->{'serverId'} ?? null,
            isset($data->{'from'}) ? Email::jsonUnserialize($data->{'from'}) : null,
            isset($data->{'replyTo'}) ? Email::jsonUnserialize($data->{'replyTo'}) : null,
            $data->{'allowedEmails'} ?? null,
        );
    }
}
