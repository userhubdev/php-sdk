<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;
use UserHub\UserV1\Flow;
use UserHub\UserV1\ListFlowsResponse;

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
        null|string $type = null,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
    ): ListFlowsResponse {
        $req = new Request('user.flows.list', 'GET', '/user/v1/flows');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($type)) {
            $req->setQuery('type', $type);
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

        return ListFlowsResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Creates a join organization flow.
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
    ): Flow {
        $req = new Request('user.flows.createJoinOrganization', 'POST', '/user/v1/flows:createJoinOrganization');
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
        $req = new Request('user.flows.get', 'GET', '/user/v1/flows/'.rawurlencode($flowId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
    }

    /**
     * Consume the flow.
     *
     * This accepts the flow (e.g. for a join organization flow it will
     * accept the invitation and add the member to the organization).
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function consume(
        string $flowId,
    ): Flow {
        $req = new Request('user.flows.consume', 'POST', '/user/v1/flows/'.rawurlencode($flowId).':consume');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
    }

    /**
     * Cancels specified flow.
     *
     * This cancels the flow and hides it from the user.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function cancel(
        string $flowId,
    ): Flow {
        $req = new Request('user.flows.cancel', 'POST', '/user/v1/flows/'.rawurlencode($flowId).':cancel');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
    }
}
