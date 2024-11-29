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
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $state = null,
        ?string $planGroupId = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
        ?string $view = null,
    ): ListSubscriptionsResponse {
        $req = new Request('admin.subscriptions.list', 'GET', '/admin/v1/subscriptions');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }
        if (!empty($state)) {
            $req->setQuery('state', $state);
        }
        if (!empty($planGroupId)) {
            $req->setQuery('planGroupId', $planGroupId);
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

        return ListSubscriptionsResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Retrieves specified subscription.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $subscriptionId,
        ?string $organizationId = null,
        ?string $userId = null,
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

        return Subscription::jsonUnserialize($res->decodeBody());
    }
}
