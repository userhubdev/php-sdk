<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\Invoice;
use UserHub\AdminV1\ListInvoicesResponse;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;

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
        null|string $userId = null,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
    ): ListInvoicesResponse {
        $req = new Request('admin.invoices.list', 'GET', '/admin/v1/invoices');
        $req->setIdempotent(true);

        if (isset($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (isset($userId)) {
            $req->setQuery('userId', $userId);
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
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $invoiceId,
        null|string $organizationId = null,
        null|string $userId = null,
    ): Invoice {
        $req = new Request('admin.invoices.get', 'GET', '/admin/v1/invoices/'.rawurlencode($invoiceId));
        $req->setIdempotent(true);

        if (isset($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (isset($userId)) {
            $req->setQuery('userId', $userId);
        }

        $res = $this->transport->execute($req);

        return $res->decodeBody([Invoice::class, 'jsonUnserialize']);
    }
}
