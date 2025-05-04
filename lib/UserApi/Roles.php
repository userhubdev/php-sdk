<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;
use UserHub\UserV1\ListRolesResponse;

/**
 * The role methods.
 */
class Roles
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * List roles.
     *
     * @param null|int    $pageSize  The maximum number of roles to return. The API may return fewer than
     *                               this value.
     *                               If unspecified, at most 20 roles will be returned.
     *                               The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken A page token, received from a previous list roles call.
     *                               Provide this to retrieve the subsequent page.
     *                               When paginating, all other parameters provided to list roles must match
     *                               the call that provided the page token.
     * @param null|string $orderBy   a comma-separated list of fields to order by
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
    ): ListRolesResponse {
        $req = new Request('user.roles.list', 'GET', '/user/v1/roles');
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

        return ListRolesResponse::jsonUnserialize($res->decodeBody());
    }
}
