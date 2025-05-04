<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\UserHubError;

/**
 * The pricing methods.
 */
class Pricing
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Get pricing.
     *
     * @param null|string $accountType    Whether to get pricing for users or organizations.
     *                                    This is not required if organization ID is specified
     *                                    and will default to user if no options are specified.
     * @param null|string $organizationId Show pricing for specified organization.
     *                                    If this and account type are not specified, it will default to
     *                                    the requesting user for authenticated requests.
     * @param null|bool   $public         Always get the current public pricing.
     *                                    For unauthenticated requests, this is always true.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        ?string $accountType = null,
        ?string $organizationId = null,
        ?bool $public = null,
    ): \UserHub\UserV1\Pricing {
        $req = new Request('user.pricing.get', 'GET', '/user/v1/pricing');
        $req->setIdempotent(true);

        if (!empty($accountType)) {
            $req->setQuery('accountType', $accountType);
        }
        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($public)) {
            $req->setQuery('public', $public);
        }

        $res = $this->transport->execute($req);

        return \UserHub\UserV1\Pricing::jsonUnserialize($res->decodeBody());
    }
}
