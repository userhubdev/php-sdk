<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\ApiV1\EmptyResponse;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Undefined;
use UserHub\UserHubError;
use UserHub\UserV1\ListOrganizationsResponse;
use UserHub\UserV1\Organization;

/**
 * The organization methods.
 */
class Organizations
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Lists organizations.
     *
     * @param null|int    $pageSize  The maximum number of organizations to return. The API may return fewer than
     *                               this value.
     *                               If unspecified, at most 20 organizations will be returned.
     *                               The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken A page token, received from a previous list organizations call.
     *                               Provide this to retrieve the subsequent page.
     *                               When paginating, all other parameters provided to list organizations must match
     *                               the call that provided the page token.
     * @param null|string $orderBy   A comma-separated list of fields to order by.
     *                               Supports:
     *                               - `displayName asc`
     *                               - `email asc`
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
    ): ListOrganizationsResponse {
        $req = new Request('user.organizations.list', 'GET', '/user/v1/organizations');
        $req->setIdempotent(true);

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

        return ListOrganizationsResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Creates a new organization.
     *
     * @param null|string $uniqueId    The client defined unique identifier of the organization account.
     *                                 It is restricted to letters, numbers, underscores, and hyphens,
     *                                 with the first character a letter or a number, and a 255
     *                                 character maximum.
     *                                 ID's starting with `org_` are reserved.
     * @param null|string $displayName The human-readable display name of the organization.
     *                                 The maximum length is 200 characters.
     * @param null|string $email       The email address of the organization.
     *                                 The maximum length is 320 characters.
     * @param null|string $flowId      The flow identifier associated with the creation of the organization.
     *                                 The flow type must be `SIGNUP` and associated with the user creating the organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function create(
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $email = null,
        ?string $flowId = null,
    ): Organization {
        $req = new Request('user.organizations.create', 'POST', '/user/v1/organizations');
        $body = [];

        if (!empty($uniqueId)) {
            $body['uniqueId'] = $uniqueId;
        }
        if (!empty($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (!empty($email)) {
            $body['email'] = $email;
        }
        if (!empty($flowId)) {
            $body['flowId'] = $flowId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Retrieves specified organization.
     *
     * @param string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $organizationId,
    ): Organization {
        $req = new Request('user.organizations.get', 'GET', '/user/v1/organizations/'.rawurlencode($organizationId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Updates specified organization.
     *
     * @param string                $organizationId the identifier of the organization
     * @param null|string|Undefined $uniqueId       The client defined unique identifier of the organization account.
     *                                              It is restricted to letters, numbers, underscores, and hyphens,
     *                                              with the first character a letter or a number, and a 255
     *                                              character maximum.
     *                                              ID's starting with `org_` are reserved.
     * @param null|string|Undefined $displayName    The human-readable display name of the organization.
     *                                              The maximum length is 200 characters.
     * @param null|string|Undefined $email          The email address of the organization.
     *                                              The maximum length is 320 characters.
     * @param null|string|Undefined $flowId         The flow identifier associated with the creation of the organization.
     *                                              The flow type must be `SIGNUP` and associated with the user creating the organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function update(
        string $organizationId,
        null|string|Undefined $uniqueId = new Undefined(),
        null|string|Undefined $displayName = new Undefined(),
        null|string|Undefined $email = new Undefined(),
        null|string|Undefined $flowId = new Undefined(),
    ): Organization {
        $req = new Request('user.organizations.update', 'PATCH', '/user/v1/organizations/'.rawurlencode($organizationId));
        $req->setIdempotent(true);

        $body = [];

        if (!$uniqueId instanceof Undefined) {
            $body['uniqueId'] = $uniqueId;
        }
        if (!$displayName instanceof Undefined) {
            $body['displayName'] = $displayName;
        }
        if (!$email instanceof Undefined) {
            $body['email'] = $email;
        }
        if (!$flowId instanceof Undefined) {
            $body['flowId'] = $flowId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Delete specified organization.
     *
     * @param string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function delete(
        string $organizationId,
    ): EmptyResponse {
        $req = new Request('user.organizations.delete', 'DELETE', '/user/v1/organizations/'.rawurlencode($organizationId));
        $res = $this->transport->execute($req);

        return EmptyResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Leave organization.
     *
     * This allows a user to remove themselves from an organization
     * without have permission to manage the organization.
     *
     * @param string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function leave(
        string $organizationId,
    ): EmptyResponse {
        $req = new Request('user.organizations.leave', 'DELETE', '/user/v1/organizations/'.rawurlencode($organizationId).':leave');
        $res = $this->transport->execute($req);

        return EmptyResponse::jsonUnserialize($res->decodeBody());
    }
}
