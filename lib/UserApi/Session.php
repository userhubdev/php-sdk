<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;

/**
 * The Portal session.
 */
class Session
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Get current session details.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(): \UserHub\UserV1\Session
    {
        $req = new Request('user.session.get', 'GET', '/user/v1/session');
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return $res->decodeBody([\UserHub\UserV1\Session::class, 'jsonUnserialize']);
    }
}
