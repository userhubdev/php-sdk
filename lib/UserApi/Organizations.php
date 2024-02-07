<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserApi;

use UserHub\ApiV1\EmptyResponse;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Undefined;
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
     */
    public function list(
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
    ): ListOrganizationsResponse {
        $req = new Request('user.organizations.list', 'GET', '/user/v1/organizations');
        $req->setIdempotent(true);

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

        return $res->decodeBody([ListOrganizationsResponse::class, 'jsonUnserialize']);
    }

    /**
     * Creates a new organization.
     */
    public function create(
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $email = null,
    ): Organization {
        $req = new Request('user.organizations.create', 'POST', '/user/v1/organizations');
        $body = [];

        if (isset($uniqueId)) {
            $body['uniqueId'] = $uniqueId;
        }
        if (isset($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (isset($email)) {
            $body['email'] = $email;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified organization.
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
     */
    public function update(
        string $organizationId,
        null|string|Undefined $uniqueId = new Undefined(),
        null|string|Undefined $displayName = new Undefined(),
        null|string|Undefined $email = new Undefined(),
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

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Delete specified organization.
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
     */
    public function leave(
        string $organizationId,
    ): EmptyResponse {
        $req = new Request('user.organizations.leave', 'DELETE', '/user/v1/organizations/'.rawurlencode($organizationId).':leave');
        $res = $this->transport->execute($req);

        return $res->decodeBody([EmptyResponse::class, 'jsonUnserialize']);
    }
}
