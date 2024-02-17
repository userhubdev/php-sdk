<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\Flow;
use UserHub\AdminV1\ListFlowsResponse;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Internal\Util;
use UserHub\UserHubError;

/**
 * The flow methods.
 */
class Flows
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Lists flows.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        null|string $organizationId = null,
        null|string $userId = null,
        null|string $type = null,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
        null|string $view = null,
    ): ListFlowsResponse {
        $req = new Request('admin.flows.list', 'GET', '/admin/v1/flows');
        $req->setIdempotent(true);

        if (isset($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (isset($userId)) {
            $req->setQuery('userId', $userId);
        }
        if (isset($type)) {
            $req->setQuery('type', $type);
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

        return $res->decodeBody([ListFlowsResponse::class, 'jsonUnserialize']);
    }

    /**
     * Create a join organization flow.
     *
     * This invites a person to join an organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createJoinOrganization(
        null|string $organizationId = null,
        null|string $userId = null,
        null|string $email = null,
        null|string $displayName = null,
        null|string $creatorUserId = null,
        null|\DateTimeInterface $expireTime = null,
        null|string $ttl = null,
    ): Flow {
        $req = new Request('admin.flows.createJoinOrganization', 'POST', '/admin/v1/flows:createJoinOrganization');
        $body = [];

        if (isset($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (isset($userId)) {
            $body['userId'] = $userId;
        }
        if (isset($email)) {
            $body['email'] = $email;
        }
        if (isset($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (isset($creatorUserId)) {
            $body['creatorUserId'] = $creatorUserId;
        }
        if (isset($expireTime)) {
            $body['expireTime'] = Util::encodeDateTime($expireTime);
        }
        if (isset($ttl)) {
            $body['ttl'] = $ttl;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Flow::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified flow.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $flowId,
    ): Flow {
        $req = new Request('admin.flows.get', 'GET', '/admin/v1/flows/'.rawurlencode($flowId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Flow::class, 'jsonUnserialize']);
    }

    /**
     * Cancels specified flow.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function cancel(
        string $flowId,
    ): Flow {
        $req = new Request('admin.flows.cancel', 'POST', '/admin/v1/flows/'.rawurlencode($flowId).':cancel');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Flow::class, 'jsonUnserialize']);
    }
}
