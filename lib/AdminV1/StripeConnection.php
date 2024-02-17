<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The stripe billing specific connection data.
 */
class StripeConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The Stripe account ID (e.g. `acct_1LcUvxQYGbxD2SPK`).
     */
    public string $accountId;

    /**
     * The live vs test status for the Stripe account.
     */
    public bool $live;

    public function __construct(
        null|string $accountId = null,
        null|bool $live = null,
    ) {
        $this->accountId = $accountId ?? '';
        $this->live = $live ?? false;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'accountId' => $this->accountId ?? null,
            'live' => $this->live ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'accountId'} ?? null,
            $data->{'live'} ?? null,
        );
    }
}
