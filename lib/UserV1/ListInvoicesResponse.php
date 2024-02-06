<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * Response message for ListInvoices.
 */
class ListInvoicesResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The list of invoices.
     *
     * @var \UserHub\UserV1\Invoice[]
     */
    public array $invoices;

    /**
     * A token, which can be sent as `pageToken` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     */
    public null|string $nextPageToken;

    /**
     * A token, which can be sent as `pageToken` to retrieve the previous page.
     * If this field is absent, there are no preceding pages. If this field is
     * an empty string then the previous page is the first result.
     */
    public null|string $previousPageToken;

    public function __construct(
        null|array $invoices = null,
        null|string $nextPageToken = null,
        null|string $previousPageToken = null,
    ) {
        $this->invoices = $invoices ?? [];
        $this->nextPageToken = $nextPageToken ?? null;
        $this->previousPageToken = $previousPageToken ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'invoices' => isset($this->invoices) ? $this->invoices : null,
            'nextPageToken' => isset($this->nextPageToken) ? $this->nextPageToken : null,
            'previousPageToken' => isset($this->previousPageToken) ? $this->previousPageToken : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new ListInvoicesResponse(
            isset($data->{'invoices'}) ? Util::mapArray($data->{'invoices'}, [Invoice::class, 'jsonUnserialize']) : null,
            isset($data->{'nextPageToken'}) ? $data->{'nextPageToken'} : null,
            isset($data->{'previousPageToken'}) ? $data->{'previousPageToken'} : null,
        );
    }
}
