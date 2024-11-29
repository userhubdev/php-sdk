<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;
use UserHub\UserV1\CreatePortalSessionResponse;
use UserHub\UserV1\ExchangeSessionTokenResponse;

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
     * Get the current session details.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(): \UserHub\UserV1\Session
    {
        $req = new Request('user.session.get', 'GET', '/user/v1/session');
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return \UserHub\UserV1\Session::jsonUnserialize($res->decodeBody());
    }

    /**
     * Exchange an ID token from your IdP for an access token.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function exchangeToken(
        ?string $token = null,
    ): ExchangeSessionTokenResponse {
        $req = new Request('user.session.exchangeToken', 'POST', '/user/v1/session:exchangeToken');
        $body = [];

        if (!empty($token)) {
            $body['token'] = $token;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return ExchangeSessionTokenResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create Portal session.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createPortal(
        ?string $organizationId = null,
        ?string $portalUrl = null,
        ?string $returnUrl = null,
        ?string $successUrl = null,
    ): CreatePortalSessionResponse {
        $req = new Request('user.session.createPortal', 'POST', '/user/v1/session:createPortal');
        $body = [];

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($portalUrl)) {
            $body['portalUrl'] = $portalUrl;
        }
        if (!empty($returnUrl)) {
            $body['returnUrl'] = $returnUrl;
        }
        if (!empty($successUrl)) {
            $body['successUrl'] = $successUrl;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return CreatePortalSessionResponse::jsonUnserialize($res->decodeBody());
    }
}
