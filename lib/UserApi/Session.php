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
     * Get details about the current session.
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
     * Exchange an ID token from an IdP for an access token.
     *
     * @param null|string $token the IdP ID token which is used to authenticated the user
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
     * Create a new Portal session.
     *
     * @param null|string $organizationId The identifier of the organization.
     *                                    When specified the `{accountId}` in the `portalUrl` will be
     *                                    replaced with the organization ID, otherwise the user ID
     *                                    will be used.
     * @param null|string $portalUrl      The Portal URL, this is the target URL on the portal site.
     *                                    If not defined the root URL for the portal will be used.
     *                                    This does not need to be the full URL, you have the option
     *                                    of passing in a path instead (e.g. `/`).
     *                                    You also have the option of including the `{accountId}`
     *                                    string in the path/URL which will be replaced with either the
     *                                    UserHub user ID (if `organizationId` is not specified)
     *                                    or the UserHub organization ID (if specified).
     *                                    Examples:
     *                                    * `/{accountId}` - the billing dashboard
     *                                    * `/{accountId}/checkout` - start a checkout
     *                                    * `/{accountId}/checkout/<some-plan-id>` - start a checkout with a specified plan
     *                                    * `/{accountId}/cancel` - cancel current plan
     *                                    * `/{accountId}/members` - manage organization members
     *                                    * `/{accountId}/invite` - invite a user to an organization
     * @param null|string $returnUrl      The URL the user should be sent to when they want to return to
     *                                    the app (e.g. cancel checkout).
     *                                    If not defined the app URL will be used.
     * @param null|string $successUrl     The URL the user should be sent after they successfully complete
     *                                    an action (e.g. checkout).
     *                                    If not defined the return URL will be used.
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
