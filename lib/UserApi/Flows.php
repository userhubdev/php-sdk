<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
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

        if (isset($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
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

        $res = $this->transport->execute($req);

        return $res->decodeBody([ListFlowsResponse::class, 'jsonUnserialize']);
    }

    /**
     * Creates a join organization flow.
     *
     * This invites a person to join an organization.
     */
    public function createJoinOrganization(
        null|string $organizationId = null,
        null|string $userId = null,
        null|string $email = null,
        null|string $displayName = null,
    ): Flow {
        $req = new Request('user.flows.createJoinOrganization', 'POST', '/user/v1/flows:createJoinOrganization');
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

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Flow::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified flow.
     */
    public function get(
        string $flowId,
    ): Flow {
        $req = new Request('user.flows.get', 'GET', '/user/v1/flows/'.rawurlencode($flowId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Flow::class, 'jsonUnserialize']);
    }

    /**
     * Consume the flow.
     *
     * This accepts the flow (e.g. for a join organization flow it will
     * accept the invitation and add the member to the organization).
     */
    public function consume(
        string $flowId,
    ): Flow {
        $req = new Request('user.flows.consume', 'POST', '/user/v1/flows/'.rawurlencode($flowId).':consume');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Flow::class, 'jsonUnserialize']);
    }

    /**
     * Cancels specified flow.
     *
     * This cancels the flow and hides it from the user.
     */
    public function cancel(
        string $flowId,
    ): Flow {
        $req = new Request('user.flows.cancel', 'POST', '/user/v1/flows/'.rawurlencode($flowId).':cancel');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Flow::class, 'jsonUnserialize']);
    }
}
