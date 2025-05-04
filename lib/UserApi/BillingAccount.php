<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\CommonV1\Address;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Undefined;
use UserHub\UserHubError;

/**
 * The billing account methods.
 */
class BillingAccount
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Get the default billing account.
     *
     * @param null|string $organizationId The identifier of the organization.
     *                                    If not specified the billing account for the user is returned.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        ?string $organizationId = null,
    ): \UserHub\UserV1\BillingAccount {
        $req = new Request('user.billing_account.get', 'GET', '/user/v1/billingAccount');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }

        $res = $this->transport->execute($req);

        return \UserHub\UserV1\BillingAccount::jsonUnserialize($res->decodeBody());
    }

    /**
     * Update the default billing account.
     *
     * @param null|string            $organizationId The identifier of the organization.
     *                                               If not specified the billing account for the user is used.
     * @param null|string|Undefined  $displayName    The human-readable display name of the billing account.
     *                                               The maximum length is 200 characters.
     *                                               This might be further restricted by the billing provider.
     * @param null|string|Undefined  $email          The email address of the billing account.
     *                                               The maximum length is 320 characters.
     *                                               This might be further restricted by the billing provider.
     * @param null|string|Undefined  $phoneNumber    The E164 phone number of the billing account (e.g. `+12125550123`).
     * @param null|Address|Undefined $address        the address for the billing account
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function update(
        null|string|Undefined $displayName = new Undefined(),
        null|string|Undefined $email = new Undefined(),
        null|string|Undefined $phoneNumber = new Undefined(),
        null|Address|Undefined $address = new Undefined(),
        ?string $organizationId = null,
    ): \UserHub\UserV1\BillingAccount {
        $req = new Request('user.billing_account.update', 'PATCH', '/user/v1/billingAccount');
        $req->setIdempotent(true);

        $body = [];

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!$displayName instanceof Undefined) {
            $body['displayName'] = $displayName;
        }
        if (!$email instanceof Undefined) {
            $body['email'] = $email;
        }
        if (!$phoneNumber instanceof Undefined) {
            $body['phoneNumber'] = $phoneNumber;
        }
        if (!$address instanceof Undefined) {
            $body['address'] = $address;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return \UserHub\UserV1\BillingAccount::jsonUnserialize($res->decodeBody());
    }
}
