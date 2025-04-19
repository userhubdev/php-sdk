<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListInvoices.
 */
final class ListInvoicesResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of invoices.
     *
     * @var Invoice[]
     */
    public array $invoices;

    /**
     * A token, which can be sent as `pageToken` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     */
    public string $nextPageToken;

    /**
     * A token, which can be sent as `pageToken` to retrieve the previous page.
     * If this field is absent, there are no preceding pages. If this field is
     * an empty string then the previous page is the first result.
     */
    public ?string $previousPageToken;

    /**
     * @param null|Invoice[] $invoices
     */
    public function __construct(
        ?array $invoices = null,
        ?string $nextPageToken = null,
        ?string $previousPageToken = null,
    ) {
        $this->invoices = $invoices ?? [];
        $this->nextPageToken = $nextPageToken ?? '';
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'invoices' => $this->invoices,
            'nextPageToken' => $this->nextPageToken,
            'previousPageToken' => $this->previousPageToken,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'invoices'}) ? Util::mapArray($data->{'invoices'}, [Invoice::class, 'jsonUnserialize']) : null,
            $data->{'nextPageToken'} ?? null,
            $data->{'previousPageToken'} ?? null,
        );
    }
}
