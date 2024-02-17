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
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
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

        return $res->decodeBody([ListOrganizationsResponse::class, 'jsonUnserialize']);
    }

    /**
     * Creates a new organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function create(
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $email = null,
        null|string $flowId = null,
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

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $organizationId,
    ): Organization {
        $req = new Request('user.organizations.get', 'GET', '/user/v1/organizations/'.rawurlencode($organizationId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Updates specified organization.
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

        if (!Undefined::is($uniqueId)) {
            $body['uniqueId'] = $uniqueId;
        }
        if (!Undefined::is($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (!Undefined::is($email)) {
            $body['email'] = $email;
        }
        if (!Undefined::is($flowId)) {
            $body['flowId'] = $flowId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Delete specified organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function delete(
        string $organizationId,
    ): Organization {
        $req = new Request('user.organizations.delete', 'DELETE', '/user/v1/organizations/'.rawurlencode($organizationId));
        $res = $this->transport->execute($req);

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Leave organization.
     *
     * This allows a user to remove themselves from an organization
     * without have permission to manage the organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function leave(
        string $organizationId,
    ): EmptyResponse {
        $req = new Request('user.organizations.leave', 'DELETE', '/user/v1/organizations/'.rawurlencode($organizationId).':leave');
        $res = $this->transport->execute($req);

        return $res->decodeBody([EmptyResponse::class, 'jsonUnserialize']);
    }
}
