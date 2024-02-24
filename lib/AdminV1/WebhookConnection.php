<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The webhook specific connection data.
 */
final class WebhookConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The URL of the events webhook.
     */
    public string $url;

    /**
     * The headers sent with requests to the connection URL.
     *
     * @var array<string, string>
     */
    public array $headers;

    /**
     * The webhook secrets.
     *
     * @var \UserHub\AdminV1\SigningSecret[]
     */
    public array $signingSecrets;

    /**
     * @param null|array<string, string>            $headers
     * @param null|\UserHub\AdminV1\SigningSecret[] $signingSecrets
     */
    public function __construct(
        null|string $url = null,
        null|array $headers = null,
        null|array $signingSecrets = null,
    ) {
        $this->url = $url ?? '';
        $this->headers = $headers ?? [];
        $this->signingSecrets = $signingSecrets ?? [];
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'url' => $this->url ?? null,
            'headers' => $this->headers ?? null,
            'signingSecrets' => $this->signingSecrets ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'url'} ?? null,
            isset($data->{'headers'}) ? (array) $data->{'headers'} : null,
            isset($data->{'signingSecrets'}) ? Util::mapArray($data->{'signingSecrets'}, [SigningSecret::class, 'jsonUnserialize']) : null,
        );
    }
}
