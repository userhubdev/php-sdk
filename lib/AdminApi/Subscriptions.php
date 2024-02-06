<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminApi;

use UserHub\AdminV1\ListSubscriptionsResponse;
use UserHub\AdminV1\Subscription;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;

/**
 * The subscription methods.
 */
class Subscriptions
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Lists subscriptions.
     */
    public function list(
        null|string $organizationId = null,
        null|string $userId = null,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
        null|string $view = null,
    ): ListSubscriptionsResponse {
        $req = new Request('admin.subscriptions.list', 'GET', '/admin/v1/subscriptions');
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
        if (isset($view)) {
            $req->setQuery('view', $view);
        }

        $res = $this->transport->execute($req);

        return $res->decodeBody([ListSubscriptionsResponse::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified subscription.
     */
    public function get(
        string $subscriptionId,
        null|string $organizationId = null,
        null|string $userId = null,
    ): Subscription {
        $req = new Request('admin.subscriptions.get', 'GET', '/admin/v1/subscriptions/'.rawurlencode($subscriptionId));
        $req->setIdempotent(true);

        if (isset($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (isset($userId)) {
            $req->setQuery('userId', $userId);
        }

        $res = $this->transport->execute($req);

        return $res->decodeBody([Subscription::class, 'jsonUnserialize']);
    }
}
