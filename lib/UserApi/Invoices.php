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
     * List invoices.
     *
     * @param null|string $organizationId Show results for specified organization.
     *                                    If this is not provided the user's individual subscription(s)
     *                                    will be returned.
     * @param null|int    $pageSize       The maximum number of invoices to return. The API may return fewer than
     *                                    this value.
     *                                    If unspecified, at most 20 invoices will be returned.
     *                                    The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken      A page token, received from a previous list invoices call.
     *                                    Provide this to retrieve the subsequent page.
     *                                    When paginating, all other parameters provided to list invoices must match
     *                                    the call that provided the page token.
     * @param null|string $orderBy        a comma-separated list of fields to order by
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?string $organizationId = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
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

        return ListInvoicesResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Get an invoice.
     *
     * @param string $invoiceId the identifier of the invoice
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $invoiceId,
    ): Invoice {
        $req = new Request('user.invoices.get', 'GET', '/user/v1/invoices/'.rawurlencode($invoiceId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return Invoice::jsonUnserialize($res->decodeBody());
    }

    /**
     * Pay an invoice.
     *
     * @param string $invoiceId the identifier of the invoice
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function pay(
        string $invoiceId,
    ): Invoice {
        $req = new Request('user.invoices.pay', 'POST', '/user/v1/invoices/'.rawurlencode($invoiceId).':pay');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Invoice::jsonUnserialize($res->decodeBody());
    }
}
