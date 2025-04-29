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
     * @param null|string $organizationId filter results by organization identifier
     * @param null|string $userId         filter results by user identifier
     * @param null|string $state          filter results by state
     * @param null|string $planGroupId    Filter results by plan group identifier.
     *                                    You can specify `unmanaged` to see all subscriptions without a plan.
     * @param null|int    $pageSize       The maximum number of subscriptions to return. The API may return fewer than
     *                                    this value.
     *                                    If unspecified, at most 20 subscriptions will be returned.
     *                                    The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken      A page token, received from a previous list subscriptions call.
     *                                    Provide this to retrieve the subsequent page.
     *                                    When paginating, all other parameters provided to list subscriptions must match
     *                                    the call that provided the page token.
     * @param null|string $orderBy        A comma-separated list of fields to order by.
     *                                    This is only supported when either `organizationId` or `userId` is specified.
     *                                    Supports:
     *                                    - `active desc`
     *                                    - `createTime desc`
     *                                    - `startTime desc`
     * @param null|string $view           The Subscription view to return in the results.
     *                                    This defaults to the `BASIC` view.
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
     * @param string      $subscriptionId the identifier of the subscription
     * @param null|string $organizationId restrict by organization identifier
     * @param null|string $userId         restrict by user identifier
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
