<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * The signing secret for the webhook.
 */
final class SigningSecret implements \JsonSerializable, JsonUnserializable
{
    /**
     * The signing secret value.
     */
    public string $secret;

    /**
     * The time the signing secret is set to expire.
     */
    public ?\DateTimeInterface $expireTime;

    public function __construct(
        ?string $secret = null,
        ?\DateTimeInterface $expireTime = null,
    ) {
        $this->secret = $secret ?? '';
        $this->expireTime = $expireTime ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'secret' => $this->secret ?? null,
            'expireTime' => isset($this->expireTime) ? Util::encodeDateTime($this->expireTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'secret'} ?? null,
            isset($data->{'expireTime'}) ? Util::decodeDateTime($data->{'expireTime'}) : null,
        );
    }
}
