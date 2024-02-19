<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;
use UserHub\UserV1\Invoice;
use UserHub\UserV1\ListInvoicesResponse;

/**
 * The invoice methods.
 */
class Invoices
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Lists invoices.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        null|string $organizationId = null,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
    ): ListInvoicesResponse {
        $req = new Request('user.invoices.list', 'GET', '/user/v1/invoices');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($pageSize)) {
            $req->setQuery('pageSize', $pageSize);
        }
        if (!empty($pageToken)) {
            $req->setQuery('pageToken', $pageToken);
        }
        if (!empty($orderBy)) {
            $req->setQuery('orderBy', $orderBy);
        }

        $res = $this->transport->execute($req);

        return $res->decodeBody([ListInvoicesResponse::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified invoice.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $invoiceId,
    ): Invoice {
        $req = new Request('user.invoices.get', 'GET', '/user/v1/invoices/'.rawurlencode($invoiceId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Invoice::class, 'jsonUnserialize']);
    }
}
