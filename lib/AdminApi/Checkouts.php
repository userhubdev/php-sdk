<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\Checkout;
use UserHub\AdminV1\CheckoutItemInput;
use UserHub\CommonV1\Address;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Undefined;
use UserHub\UserHubError;

/**
 * The checkout methods.
 */
class Checkouts
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Create a checkout.
     *
     * @param null|bool   $submit         attempt to submit checkout if ready and due amount is zero
     * @param null|string $organizationId The identifier of the organization.
     *                                    This is required if the user identifier is not specified.
     * @param null|string $userId         The identifier of the user.
     *                                    This is required if the organization identifier is not specified.
     * @param null|string $type           the type of the checkout
     * @param null|string $planId         The identifier of the plan.
     *                                    This allows you to specify the currently selected plan.
     * @param null|string $subscriptionId The identifier of the subscriptions.
     *                                    This allows you to specify a non-default subscription.
     * @param null|string $connectionId   The identifier of the connection.
     *                                    This allows you to specify a non-default billing connection.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function create(
        ?string $organizationId = null,
        ?string $userId = null,
        ?string $type = null,
        ?string $planId = null,
        ?string $subscriptionId = null,
        ?string $connectionId = null,
        ?bool $submit = null,
    ): Checkout {
        $req = new Request('admin.checkouts.create', 'POST', '/admin/v1/checkouts');
        $body = [];

        if (!empty($submit)) {
            $req->setQuery('submit', $submit);
        }
        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }
        if (!empty($userId)) {
            $body['userId'] = $userId;
        }
        if (!empty($type)) {
            $body['type'] = $type;
        }
        if (!empty($planId)) {
            $body['planId'] = $planId;
        }
        if (!empty($subscriptionId)) {
            $body['subscriptionId'] = $subscriptionId;
        }
        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Get a checkout.
     *
     * @param string $checkoutId the identifier of the checkout
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $checkoutId,
    ): Checkout {
        $req = new Request('admin.checkouts.get', 'GET', '/admin/v1/checkouts/'.rawurlencode($checkoutId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set plan for a checkout.
     *
     * @param string              $checkoutId the identifier of the checkout
     * @param null|string         $planId     The identifier of the plan.
     *                                        This is required if completed isn't set to true.
     * @param null|bool|Undefined $completed  mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setPlan(
        string $checkoutId,
        ?string $planId = null,
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.setPlan', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':setPlan');
        $body = [];

        if (!empty($planId)) {
            $body['planId'] = $planId;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set terms for a checkout.
     *
     * This is generally used to select a billing cycle for
     * the plan.
     *
     * @param string              $checkoutId the identifier of the checkout
     * @param null|string         $planId     The identifier of the plan.
     *                                        This is required if completed isn't set to true.
     * @param null|bool|Undefined $completed  mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setTerms(
        string $checkoutId,
        ?string $planId = null,
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.setTerms', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':setTerms');
        $body = [];

        if (!empty($planId)) {
            $body['planId'] = $planId;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set trial settings for a checkout.
     *
     * @param string              $checkoutId the identifier of the checkout
     * @param null|string         $type       whether to start, continue, or stop a trial
     * @param null|int|Undefined  $days       the number of days to trial
     * @param null|bool|Undefined $completed  mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setTrial(
        string $checkoutId,
        ?string $type = null,
        null|int|Undefined $days = new Undefined(),
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.setTrial', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':setTrial');
        $body = [];

        if (!empty($type)) {
            $body['type'] = $type;
        }
        if (!$days instanceof Undefined) {
            $body['days'] = $days;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set item quantities for a checkout.
     *
     * @param string                   $checkoutId the identifier of the checkout
     * @param null|CheckoutItemInput[] $items      the items to update
     * @param null|bool|Undefined      $completed  mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setItems(
        string $checkoutId,
        ?array $items = null,
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.setItems', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':setItems');
        $body = [];

        if (!empty($items)) {
            $body['items'] = $items;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set payment method for a checkout.
     *
     * @param string              $checkoutId      the identifier of the checkout
     * @param null|string         $paymentMethodId The identifier of the payment method.
     *                                             This is required if external ID isn't specified or completed
     *                                             isn't set to true.
     * @param null|string         $externalId      The external identifier of the payment method to connect.
     *                                             This is required if payment method ID isn't specified or
     *                                             completed isn't set to true.
     * @param null|bool|Undefined $completed       mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setPaymentMethod(
        string $checkoutId,
        ?string $paymentMethodId = null,
        ?string $externalId = null,
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.setPaymentMethod', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':setPaymentMethod');
        $body = [];

        if (!empty($paymentMethodId)) {
            $body['paymentMethodId'] = $paymentMethodId;
        }
        if (!empty($externalId)) {
            $body['externalId'] = $externalId;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set billing details for a checkout.
     *
     * @param string              $checkoutId the identifier of the checkout
     * @param null|string         $fullName   The company or individual's full name.
     *                                        The maximum length is 200 characters.
     * @param null|Address        $address    the billing details address
     * @param null|bool|Undefined $completed  mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setBillingDetails(
        string $checkoutId,
        ?string $fullName = null,
        ?Address $address = null,
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.setBillingDetails', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':setBillingDetails');
        $body = [];

        if (!empty($fullName)) {
            $body['fullName'] = $fullName;
        }
        if (!empty($address)) {
            $body['address'] = $address;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Add discount to a checkout.
     *
     * @param string              $checkoutId the identifier of the checkout
     * @param null|string         $code       the discount code
     * @param null|bool|Undefined $completed  mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function addDiscount(
        string $checkoutId,
        ?string $code = null,
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.addDiscount', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':addDiscount');
        $body = [];

        if (!empty($code)) {
            $body['code'] = $code;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Remove discount from a checkout.
     *
     * @param string      $checkoutId         the identifier of the checkout
     * @param null|string $checkoutDiscountId the identifier of the checkout discount
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function removeDiscount(
        string $checkoutId,
        ?string $checkoutDiscountId = null,
    ): Checkout {
        $req = new Request('admin.checkouts.removeDiscount', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':removeDiscount');
        $body = [];

        if (!empty($checkoutDiscountId)) {
            $body['checkoutDiscountId'] = $checkoutDiscountId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Complete payment for a checkout.
     *
     * @param string $checkoutId the identifier of the checkout
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function completePayment(
        string $checkoutId,
    ): Checkout {
        $req = new Request('admin.checkouts.completePayment', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':completePayment');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Set cancel type for a checkout.
     *
     * @param string              $checkoutId the identifier of the checkout
     * @param null|string         $type       whether to cancel at the end of the billing period or immediately
     * @param null|bool|Undefined $completed  mark the step completed if it is optional
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function setCancel(
        string $checkoutId,
        ?string $type = null,
        null|bool|Undefined $completed = new Undefined(),
    ): Checkout {
        $req = new Request('admin.checkouts.setCancel', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':setCancel');
        $body = [];

        if (!empty($type)) {
            $body['type'] = $type;
        }
        if (!$completed instanceof Undefined) {
            $body['completed'] = $completed;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Submit a checkout for processing.
     *
     * @param string $checkoutId the identifier of the checkout
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function submit(
        string $checkoutId,
    ): Checkout {
        $req = new Request('admin.checkouts.submit', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':submit');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }

    /**
     * Cancel a checkout.
     *
     * @param string $checkoutId the identifier of the checkout
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function cancel(
        string $checkoutId,
    ): Checkout {
        $req = new Request('admin.checkouts.cancel', 'POST', '/admin/v1/checkouts/'.rawurlencode($checkoutId).':cancel');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Checkout::jsonUnserialize($res->decodeBody());
    }
}
