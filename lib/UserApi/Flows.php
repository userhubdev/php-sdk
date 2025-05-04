<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Undefined;
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
     * List flows.
     *
     * @param null|string $organizationId The identifier of the organization.
     *                                    When not set the user's flows are returned.
     *                                    Otherwise if the user is an admin of the provided organization then
     *                                    the flows associated with that organization are returned.
     * @param null|string $type           filter the results by the specified flow type
     * @param null|bool   $active         whether to filter out flows not in the `START_PENDING` or `STARTED`
     *                                    state
     * @param null|bool   $creator        whether to only return flows created by the authenticated user
     * @param null|int    $pageSize       The maximum number of flows to return. The API may return fewer than
     *                                    this value.
     *                                    If unspecified, at most 20 flows will be returned.
     *                                    The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken      A page token, received from a previous list flows call.
     *                                    Provide this to retrieve the subsequent page.
     *                                    When paginating, all other parameters provided to list flows must match
     *                                    the call that provided the page token.
     * @param null|string $orderBy        a comma-separated list of fields to order by
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?string $organizationId = null,
        ?string $type = null,
        ?bool $active = null,
        ?bool $creator = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
    ): ListFlowsResponse {
        $req = new Request('user.flows.list', 'GET', '/user/v1/flows');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($type)) {
            $req->setQuery('type', $type);
        }
        if (!empty($active)) {
            $req->setQuery('active', $active);
        }
        if (!empty($creator)) {
            $req->setQuery('creator', $creator);
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
     * Create a new join organization flow.
     *
     * This invites a person to join an organization.
     *
     * @param null|string $organizationId the identifier of the organization
     * @param null|string $userId         The identifier of the user.
     *                                    This is required if email is not specified.
     * @param null|string $email          The email address of the person to invite.
     *                                    This is required if user is not specified or the user
     *                                    does not have an email address.
     * @param null|string $displayName    the display name of the person to invite
     * @param null|string $roleId         the identifier of the role
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createJoinOrganization(
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $email = null,
        ?string $displayName = null,
        ?string $roleId = null,
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
        if (!empty($roleId)) {
            $body['roleId'] = $roleId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
    }

    /**
     * Update a join organization flow.
     *
     * @param string                $flowId the identifier of the flow
     * @param null|string|Undefined $roleId the identifier of the role
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function updateJoinOrganization(
        string $flowId,
        null|string|Undefined $roleId = new Undefined(),
    ): Flow {
        $req = new Request('user.flows.updateJoinOrganization', 'PATCH', '/user/v1/flows/'.rawurlencode($flowId).':updateJoinOrganization');
        $req->setIdempotent(true);

        $body = [];

        if (!$roleId instanceof Undefined) {
            $body['roleId'] = $roleId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create a new signup flow.
     *
     * This invites a person to join the app.
     *
     * @param null|string $email              the email address of the person to invite
     * @param null|string $displayName        the display name of the person to invite
     * @param null|bool   $createOrganization whether to create an organization as part of the signup flow
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createSignup(
        ?string $email = null,
        ?string $displayName = null,
        ?bool $createOrganization = null,
    ): Flow {
        $req = new Request('user.flows.createSignup', 'POST', '/user/v1/flows:createSignup');
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

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Flow::jsonUnserialize($res->decodeBody());
    }

    /**
     * Get a flow.
     *
     * @param string $flowId the identifier of the flow or the flow secret
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
     * Consume a flow.
     *
     * This accepts the flow (e.g. for a join organization flow it will
     * accept the invitation and add the member to the organization).
     *
     * @param string $flowId the identifier of the flow or the flow secret
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
     * Cancel a flow.
     *
     * This cancels the flow and hides it from the user.
     *
     * @param string $flowId the identifier of the flow or the flow secret
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
