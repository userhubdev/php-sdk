<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;

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
     */
    public function get(): \UserHub\UserV1\Session
    {
        $req = new Request('user.session.get', 'GET', '/user/v1/session');
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return $res->decodeBody([\UserHub\UserV1\Session::class, 'jsonUnserialize']);
    }
}
