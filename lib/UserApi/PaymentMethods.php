<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\ApiV1\EmptyResponse;
use UserHub\CommonV1\Address;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Undefined;
use UserHub\UserHubError;
use UserHub\UserV1\ListPaymentMethodsResponse;
use UserHub\UserV1\PaymentMethod;
use UserHub\UserV1\PaymentMethodIntent;

/**
 * The payment method methods.
 */
class PaymentMethods
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * List payment methods for an account.
     *
     * @param null|string $organizationId Show results for specified organization.
     *                                    If this is not provided the user's individual subscription(s)
     *                                    will be returned.
     * @param null|int    $pageSize       The maximum number of payment methods to return. The API may return fewer than
     *                                    this value.
     *                                    If unspecified, at most 20 payment methods will be returned.
     *                                    The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken      A page token, received from a previous list payment methods call.
     *                                    Provide this to retrieve the subsequent page.
     *                                    When paginating, all other parameters provided to list payment methods must match
     *                                    the call that provided the page token.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?string $organizationId = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
    ): ListPaymentMethodsResponse {
        $req = new Request('user.payment_methods.list', 'GET', '/user/v1/paymentMethods');
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($pageSize)) {
            $req->setQuery('pageSize', $pageSize);
        }
        if (!empty($pageToken)) {
            $req->setQuery('pageToken', $pageToken);
        }

        $res = $this->transport->execute($req);

        return ListPaymentMethodsResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create a new payment method.
     *
     * @param null|string $organizationId the identifier of the organization
     * @param null|string $externalId     the external identifier of the payment method to connect
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function create(
        ?string $organizationId = null,
        ?string $externalId = null,
    ): PaymentMethod {
        $req = new Request('user.payment_methods.create', 'POST', '/user/v1/paymentMethods');
        $body = [];

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($externalId)) {
            $body['externalId'] = $externalId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PaymentMethod::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create a new payment method intent.
     *
     * This can be used with a third-party billing provider to
     * store a payment method.
     *
     * @param null|string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createIntent(
        ?string $organizationId = null,
    ): PaymentMethodIntent {
        $req = new Request('user.payment_methods.createIntent', 'POST', '/user/v1/paymentMethods:createIntent');
        $body = [];

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PaymentMethodIntent::jsonUnserialize($res->decodeBody());
    }

    /**
     * Get a payment method.
     *
     * @param string $paymentMethodId the identifier of the payment method
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $paymentMethodId,
    ): PaymentMethod {
        $req = new Request('user.payment_methods.get', 'GET', '/user/v1/paymentMethods/'.rawurlencode($paymentMethodId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return PaymentMethod::jsonUnserialize($res->decodeBody());
    }

    /**
     * Update a payment method.
     *
     * @param string                 $paymentMethodId the identifier of the payment method
     * @param null|string|Undefined  $fullName        The full name of the owner of the payment method (e.g. `Jane Doe`).
     * @param null|Address|Undefined $address         the address for the payment method
     * @param null|int|Undefined     $expYear         The card expiration year (e.g. `2030`).
     * @param null|int|Undefined     $expMonth        The card expiration month (e.g. `12`).
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function update(
        string $paymentMethodId,
        null|string|Undefined $fullName = new Undefined(),
        null|Address|Undefined $address = new Undefined(),
        null|int|Undefined $expYear = new Undefined(),
        null|int|Undefined $expMonth = new Undefined(),
    ): PaymentMethod {
        $req = new Request('user.payment_methods.update', 'PATCH', '/user/v1/paymentMethods/'.rawurlencode($paymentMethodId));
        $req->setIdempotent(true);

        $body = [];

        if (!$fullName instanceof Undefined) {
            $body['fullName'] = $fullName;
        }
        if (!$address instanceof Undefined) {
            $body['address'] = $address;
        }
        if (!$expYear instanceof Undefined) {
            $body['expYear'] = $expYear;
        }
        if (!$expMonth instanceof Undefined) {
            $body['expMonth'] = $expMonth;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PaymentMethod::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set a default payment method for an account.
     *
     * @param string $paymentMethodId the identifier of the payment method
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setDefault(
        string $paymentMethodId,
    ): PaymentMethod {
        $req = new Request('user.payment_methods.setDefault', 'POST', '/user/v1/paymentMethods/'.rawurlencode($paymentMethodId).':setDefault');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PaymentMethod::jsonUnserialize($res->decodeBody());
    }

    /**
     * Delete a payment method.
     *
     * @param string $paymentMethodId the identifier of the payment method
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function delete(
        string $paymentMethodId,
    ): EmptyResponse {
        $req = new Request('user.payment_methods.delete', 'DELETE', '/user/v1/paymentMethods/'.rawurlencode($paymentMethodId));
        $res = $this->transport->execute($req);

        return EmptyResponse::jsonUnserialize($res->decodeBody());
    }
}
