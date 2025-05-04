<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

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
     *                                    This is not required if either user ID or organization ID is specified
     *                                    and will default to user if no options are specified.
     * @param null|string $organizationId show pricing for specified organization
     * @param null|string $userId         show pricing for the specified user
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        ?string $accountType = null,
        ?string $organizationId = null,
        ?string $userId = null,
    ): \UserHub\AdminV1\Pricing {
        $req = new Request('admin.pricing.get', 'GET', '/admin/v1/pricing');
        $req->setIdempotent(true);

        if (!empty($accountType)) {
            $req->setQuery('accountType', $accountType);
        }
        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }

        $res = $this->transport->execute($req);

        return \UserHub\AdminV1\Pricing::jsonUnserialize($res->decodeBody());
    }
}
