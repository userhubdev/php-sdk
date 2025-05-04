<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\PaymentMethod;
use UserHub\AdminV1\PaymentMethodIntent;
use UserHub\ApiV1\EmptyResponse;
use UserHub\CommonV1\Address;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Undefined;
use UserHub\UserHubError;

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
     * Create a payment method.
     *
     * @param null|string $organizationId The identifier of the organization.
     *                                    This is required if the user identifier not specified.
     * @param null|string $userId         The identifier of the user.
     *                                    This is required if the organization identifier not specified.
     * @param null|string $connectionId   the identifier of the connection
     * @param null|string $externalId     the external identifier of the payment method to connect
     * @param null|bool   $default        Whether to set the payment method as the default.
     *                                    This defaults to true.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function create(
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $connectionId = null,
        ?string $externalId = null,
        ?bool $default = null,
    ): PaymentMethod {
        $req = new Request('admin.payment_methods.create', 'POST', '/admin/v1/paymentMethods');
        $body = [];

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($userId)) {
            $body['userId'] = $userId;
        }
        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (!empty($externalId)) {
            $body['externalId'] = $externalId;
        }
        if (!empty($default)) {
            $body['default'] = $default;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PaymentMethod::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create a payment method intent.
     *
     * This can be used with a third-party billing provider API
     * to store a payment method.
     *
     * @param null|string $organizationId The identifier of the organization.
     *                                    This is required if the user identifier is not specified.
     * @param null|string $userId         The identifier of the user.
     *                                    This is required if the organization identifier is not not
     *                                    specified.
     * @param null|string $connectionId   the identifier of the connection
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createIntent(
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $connectionId = null,
    ): PaymentMethodIntent {
        $req = new Request('admin.payment_methods.createIntent', 'POST', '/admin/v1/paymentMethods:createIntent');
        $body = [];

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($userId)) {
            $body['userId'] = $userId;
        }
        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PaymentMethodIntent::jsonUnserialize($res->decodeBody());
    }

    /**
     * Get a payment method.
     *
     * @param string      $paymentMethodId the identifier of the payment method
     * @param null|string $organizationId  The identifier of the organization.
     *                                     Optionally restrict update to payment methods owned by
     *                                     this organization.
     * @param null|string $userId          The identifier of the user.
     *                                     Optionally restrict update to payment methods owned by
     *                                     this user.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $paymentMethodId,
        ?string $organizationId = null,
        ?string $userId = null,
    ): PaymentMethod {
        $req = new Request('admin.payment_methods.get', 'GET', '/admin/v1/paymentMethods/'.rawurlencode($paymentMethodId));
        $req->setIdempotent(true);

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }

        $res = $this->transport->execute($req);

        return PaymentMethod::jsonUnserialize($res->decodeBody());
    }

    /**
     * Update a payment method.
     *
     * @param string                 $paymentMethodId the identifier of the payment method
     * @param null|string            $organizationId  The identifier of the organization.
     *                                                Optionally restrict update to payment methods owned by
     *                                                this organization.
     * @param null|string            $userId          The identifier of the user.
     *                                                Optionally restrict update to payment methods owned by
     *                                                this user.
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
        ?string $organizationId = null,
        ?string $userId = null,
    ): PaymentMethod {
        $req = new Request('admin.payment_methods.update', 'PATCH', '/admin/v1/paymentMethods/'.rawurlencode($paymentMethodId));
        $req->setIdempotent(true);

        $body = [];

        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }
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
     * @param string      $paymentMethodId the identifier of the payment method
     * @param null|string $organizationId  The identifier of the organization.
     *                                     Optionally restrict set default to payment methods owned by
     *                                     this organization.
     * @param null|string $userId          The identifier of the user.
     *                                     Optionally restrict set default to payment methods owned by
     *                                     this user.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setDefault(
        string $paymentMethodId,
        ?string $organizationId = null,
        ?string $userId = null,
    ): PaymentMethod {
        $req = new Request('admin.payment_methods.setDefault', 'POST', '/admin/v1/paymentMethods/'.rawurlencode($paymentMethodId).':setDefault');
        $body = [];

        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($userId)) {
            $body['userId'] = $userId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PaymentMethod::jsonUnserialize($res->decodeBody());
    }

    /**
     * Delete a payment method.
     *
     * @param string      $paymentMethodId the identifier of the payment method
     * @param null|string $organizationId  The identifier of the organization.
     *                                     Optionally restrict delete to payment methods owned by
     *                                     this organization.
     * @param null|string $userId          The identifier of the user.
     *                                     Optionally restrict delete to payment methods owned by
     *                                     this user.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function delete(
        string $paymentMethodId,
        ?string $organizationId = null,
        ?string $userId = null,
    ): EmptyResponse {
        $req = new Request('admin.payment_methods.delete', 'DELETE', '/admin/v1/paymentMethods/'.rawurlencode($paymentMethodId));
        if (!empty($organizationId)) {
            $req->setQuery('organizationId', $organizationId);
        }
        if (!empty($userId)) {
            $req->setQuery('userId', $userId);
        }

        $res = $this->transport->execute($req);

        return EmptyResponse::jsonUnserialize($res->decodeBody());
    }
}
