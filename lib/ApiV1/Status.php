<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The full API error.
 */
final class Status implements \JsonSerializable, JsonUnserializable
{
    /**
     * The general error code (e.g. `INVALID_ARGUMENT`).
     */
    public string $code;

    /**
     * A developer-facing error message.
     */
    public string $message;

    /**
     * A reason code for the error (e.g. `USER_PENDING_DELETION`).
     */
    public ?string $reason;

    /**
     * The parameter path related to the error (e.g. `member.userId`).
     */
    public ?string $param;

    /**
     * Additional metadata related to the error.
     *
     * @var array<string, string>
     */
    public array $metadata;

    /**
     * A user-facing error message.
     */
    public ?string $localeMessage;

    /**
     * @param null|array<string, string> $metadata
     */
    public function __construct(
        ?string $code = null,
        ?string $message = null,
        ?string $reason = null,
        ?string $param = null,
        ?array $metadata = null,
        ?string $localeMessage = null,
    ) {
        $this->code = $code ?? '';
        $this->message = $message ?? '';
        $this->reason = $reason ?? null;
        $this->param = $param ?? null;
        $this->metadata = $metadata ?? [];
        $this->localeMessage = $localeMessage ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'code' => $this->code,
            'message' => $this->message,
            'reason' => $this->reason,
            'param' => $this->param,
            'metadata' => $this->metadata,
            'localeMessage' => $this->localeMessage,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'code'} ?? null,
            $data->{'message'} ?? null,
            $data->{'reason'} ?? null,
            $data->{'param'} ?? null,
            isset($data->{'metadata'}) ? (array) $data->{'metadata'} : null,
            $data->{'localeMessage'} ?? null,
        );
    }
}
