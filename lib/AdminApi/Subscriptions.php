<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\ListSubscriptionsResponse;
use UserHub\AdminV1\Subscription;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;

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
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
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

        return $res->decodeBody([ListSubscriptionsResponse::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified subscription.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $subscriptionId,
        null|string $organizationId = null,
        null|string $userId = null,
    ): Subscription {
        $req = new Request('admin.subscriptions.get', 'GET', '/admin/v1/subscriptions/'.rawurlencode($subscriptionId));
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }

        $res = $this->transport->execute($req);

        return $res->decodeBody([Subscription::class, 'jsonUnserialize']);
    }
}
