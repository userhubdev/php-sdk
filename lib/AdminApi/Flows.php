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
        null|bool $active = null,
        null|string $creatorUserId = null,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
        null|string $view = null,
    ): ListFlowsResponse {
        $req = new Request('admin.flows.list', 'GET', '/admin/v1/flows');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }
        if (!empty($type)) {
            $req->setQuery('type', $type);
        }
        if (!empty($active)) {
            $req->setQuery('active', $active);
        }
        if (!empty($creatorUserId)) {
            $req->setQuery('creatorUserId', $creatorUserId);
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

        return ListFlowsResponse::jsonUnserialize($res->decodeBody());
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

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($userId)) {
            $body['userId'] = $userId;
        }
        if (!empty($email)) {
            $body['email'] = $email;
        }
        if (!empty($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (!empty($creatorUserId)) {
            $body['creatorUserId'] = $creatorUserId;
        }
        if (!empty($expireTime)) {
            $body['expireTime'] = Util::encodeDateTime($expireTime);
        }
        if (!empty($ttl)) {
            $body['ttl'] = $ttl;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create a signup flow.
     *
     * This invites a person to join the app.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createSignup(
        null|string $email = null,
        null|string $displayName = null,
        null|bool $createOrganization = null,
        null|string $creatorUserId = null,
        null|\DateTimeInterface $expireTime = null,
        null|string $ttl = null,
    ): Flow {
        $req = new Request('admin.flows.createSignup', 'POST', '/admin/v1/flows:createSignup');
        $body = [];

        if (!empty($email)) {
            $body['email'] = $email;
        }
        if (!empty($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (!empty($createOrganization)) {
            $body['createOrganization'] = $createOrganization;
        }
        if (!empty($creatorUserId)) {
            $body['creatorUserId'] = $creatorUserId;
        }
        if (!empty($expireTime)) {
            $body['expireTime'] = Util::encodeDateTime($expireTime);
        }
        if (!empty($ttl)) {
            $body['ttl'] = $ttl;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
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

        return Flow::jsonUnserialize($res->decodeBody());
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

        return Flow::jsonUnserialize($res->decodeBody());
    }
}
