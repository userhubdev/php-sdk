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
     * @param null|string $organizationId filter results by organization identifier
     * @param null|string $userId         filter results by user identifier
     * @param null|string $type           filter the results by the specified flow type
     * @param null|bool   $active         whether to filter out flows not in the `START_PENDING` or `STARTED`
     *                                    state
     * @param null|string $creatorUserId  The identifier of the user that created the flow.
     *                                    When this is specified only the flows created by the user are
     *                                    returned.
     * @param null|int    $pageSize       The maximum number of flows to return. The API may return fewer than
     *                                    this value.
     *                                    If unspecified, at most 20 flows will be returned.
     *                                    The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken      A page token, received from a previous list flows call.
     *                                    Provide this to retrieve the subsequent page.
     *                                    When paginating, all other parameters provided to list flows must match
     *                                    the call that provided the page token.
     * @param null|string $orderBy        A comma-separated list of fields to order by.
     *                                    Supports:
     *                                    - `createTime desc`
     * @param null|string $view           The Flow view to return in the results.
     *                                    This defaults to the `BASIC` view.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $type = null,
        ?bool $active = null,
        ?string $creatorUserId = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
        ?string $view = null,
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
     * @param null|string             $organizationId the identifier of the organization
     * @param null|string             $userId         The identifier of the user.
     *                                                This is required if email is not specified.
     * @param null|string             $email          The email address of the person to invite.
     *                                                This is required if user is not specified or the user
     *                                                does not have an email address.
     * @param null|string             $displayName    the display name of the person to invite
     * @param null|string             $roleId         the identifier of the role
     * @param null|string             $creatorUserId  the identifier of the user sending the invite
     * @param null|\DateTimeInterface $expireTime     The time the flow will expire.
     *                                                This field is not allowed if `ttl` is specified.
     * @param null|string             $ttl            The amount of time a flow will be available (e.g. `86400s`).
     *                                                This must be a string with the number of seconds followed by a
     *                                                trailing `s`.
     *                                                This field is not allowed if `expireTime` is specified.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createJoinOrganization(
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $email = null,
        ?string $displayName = null,
        ?string $roleId = null,
        ?string $creatorUserId = null,
        ?\DateTimeInterface $expireTime = null,
        ?string $ttl = null,
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
        if (!empty($roleId)) {
            $body['roleId'] = $roleId;
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
     * @param null|string             $email              the email address of the person to invite
     * @param null|string             $displayName        the display name of the person to invite
     * @param null|bool               $createOrganization whether to create an organization as part of the signup flow
     * @param null|string             $creatorUserId      the identifier of the user sending the invite
     * @param null|\DateTimeInterface $expireTime         The time the flow will expire.
     *                                                    This field is not allowed if `ttl` is specified.
     * @param null|string             $ttl                The amount of time a flow will be available (e.g. `86400s`).
     *                                                    This must be a string with the number of seconds followed by a
     *                                                    trailing `s`.
     *                                                    This field is not allowed if `expireTime` is specified.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createSignup(
        ?string $email = null,
        ?string $displayName = null,
        ?bool $createOrganization = null,
        ?string $creatorUserId = null,
        ?\DateTimeInterface $expireTime = null,
        ?string $ttl = null,
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
     * @param string $flowId the identifier of the flow
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
     * @param string $flowId the identifier of the flow
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
