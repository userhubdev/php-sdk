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
     * List invoices.
     *
     * @param null|string $organizationId Filter results by organization identifier.
     *                                    This is required if the user identifier is not specified.
     * @param null|string $userId         Filter results by user identifier.
     *                                    This is required if the organization identifier is not specified.
     * @param null|int    $pageSize       The maximum number of invoices to return. The API may return fewer than
     *                                    this value.
     *                                    If unspecified, at most 20 invoices will be returned.
     *                                    The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken      A page token, received from a previous list invoices call.
     *                                    Provide this to retrieve the subsequent page.
     *                                    When paginating, all other parameters provided to list invoices must match
     *                                    the call that provided the page token.
     * @param null|string $orderBy        a comma-separated list of fields to order by
     * @param null|string $view           The Invoice view to return in the results.
     *                                    This defaults to the `BASIC` view.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?string $organizationId = null,
        ?string $userId = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
        ?string $view = null,
    ): ListInvoicesResponse {
        $req = new Request('admin.invoices.list', 'GET', '/admin/v1/invoices');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
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
        if (!empty($view)) {
            $req->setQuery('view', $view);
        }

        $res = $this->transport->execute($req);

        return ListInvoicesResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Get an invoice.
     *
     * @param string      $invoiceId      the identifier of the invoice
     * @param null|string $organizationId restrict by organization identifier
     * @param null|string $userId         restrict by user identifier
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $invoiceId,
        ?string $organizationId = null,
        ?string $userId = null,
    ): Invoice {
        $req = new Request('admin.invoices.get', 'GET', '/admin/v1/invoices/'.rawurlencode($invoiceId));
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }

        $res = $this->transport->execute($req);

        return Invoice::jsonUnserialize($res->decodeBody());
    }

    /**
     * Pay an invoice.
     *
     * @param string      $invoiceId       the identifier of the invoice
     * @param null|string $organizationId  restrict by organization identifier
     * @param null|string $userId          restrict by user identifier
     * @param null|string $paymentMethodId The identifier of the payment method.
     *                                     The default payment method will be used if not specified.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function pay(
        string $invoiceId,
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $paymentMethodId = null,
    ): Invoice {
        $req = new Request('admin.invoices.pay', 'POST', '/admin/v1/invoices/'.rawurlencode($invoiceId).':pay');
        $body = [];

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($userId)) {
            $body['userId'] = $userId;
        }
        if (!empty($paymentMethodId)) {
            $body['paymentMethodId'] = $paymentMethodId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Invoice::jsonUnserialize($res->decodeBody());
    }
}
