<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
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
     */
    public function list(
        null|string $organizationId = null,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
    ): ListInvoicesResponse {
        $req = new Request('user.invoices.list', 'GET', '/user/v1/invoices');
        $req->setIdempotent(true);

        if (isset($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (isset($pageSize)) {
            $req->setQuery('pageSize', $pageSize);
        }
        if (isset($pageToken)) {
            $req->setQuery('pageToken', $pageToken);
        }
        if (isset($orderBy)) {
            $req->setQuery('orderBy', $orderBy);
        }

        $res = $this->transport->execute($req);

        return $res->decodeBody([ListInvoicesResponse::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified invoice.
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
