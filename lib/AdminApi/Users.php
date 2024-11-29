<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\CreateApiSessionResponse;
use UserHub\AdminV1\CreatePortalSessionResponse;
use UserHub\AdminV1\ListUsersResponse;
use UserHub\AdminV1\PurgeUserResponse;
use UserHub\AdminV1\User;
use UserHub\CommonV1\Address;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Internal\Util;
use UserHub\Undefined;
use UserHub\UserHubError;

/**
 * The user methods.
 */
class Users
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Lists users.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function list(
        ?string $displayName = null,
        ?string $email = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
        ?bool $showDeleted = null,
        ?string $view = null,
    ): ListUsersResponse {
        $req = new Request('admin.users.list', 'GET', '/admin/v1/users');
        $req->setIdempotent(true);

        if (!empty($displayName)) {
            $req->setQuery('displayName', $displayName);
        }
        if (!empty($email)) {
            $req->setQuery('email', $email);
        }
        if (!empty($pageSize)) {
            $req->setQuery('pageSize', $pageSize);
        }
        if (!empty($pageToken)) {
            $req->setQuery('pageToken', $pageToken);
        }
        if (!empty($orderBy)) {
            $req->setQuery('orderBy', $orderBy);
        }
        if (!empty($showDeleted)) {
            $req->setQuery('showDeleted', $showDeleted);
        }
        if (!empty($view)) {
            $req->setQuery('view', $view);
        }

        $res = $this->transport->execute($req);

        return ListUsersResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Creates a new user.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function create(
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $email = null,
        ?bool $emailVerified = null,
        ?string $phoneNumber = null,
        ?bool $phoneNumberVerified = null,
        ?string $imageUrl = null,
        ?string $currencyCode = null,
        ?string $languageCode = null,
        ?string $regionCode = null,
        ?string $timeZone = null,
        ?Address $address = null,
        ?\DateTimeInterface $signupTime = null,
        ?bool $disabled = null,
    ): User {
        $req = new Request('admin.users.create', 'POST', '/admin/v1/users');
        $body = [];

        if (!empty($uniqueId)) {
            $body['uniqueId'] = $uniqueId;
        }
        if (!empty($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (!empty($email)) {
            $body['email'] = $email;
        }
        if (!empty($emailVerified)) {
            $body['emailVerified'] = $emailVerified;
        }
        if (!empty($phoneNumber)) {
            $body['phoneNumber'] = $phoneNumber;
        }
        if (!empty($phoneNumberVerified)) {
            $body['phoneNumberVerified'] = $phoneNumberVerified;
        }
        if (!empty($imageUrl)) {
            $body['imageUrl'] = $imageUrl;
        }
        if (!empty($currencyCode)) {
            $body['currencyCode'] = $currencyCode;
        }
        if (!empty($languageCode)) {
            $body['languageCode'] = $languageCode;
        }
        if (!empty($regionCode)) {
            $body['regionCode'] = $regionCode;
        }
        if (!empty($timeZone)) {
            $body['timeZone'] = $timeZone;
        }
        if (!empty($address)) {
            $body['address'] = $address;
        }
        if (!empty($signupTime)) {
            $body['signupTime'] = Util::encodeDateTime($signupTime);
        }
        if (!empty($disabled)) {
            $body['disabled'] = $disabled;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Retrieves specified user.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $userId,
    ): User {
        $req = new Request('admin.users.get', 'GET', '/admin/v1/users/'.rawurlencode($userId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Updates specified user.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function update(
        string $userId,
        null|string|Undefined $uniqueId = new Undefined(),
        null|string|Undefined $displayName = new Undefined(),
        null|string|Undefined $email = new Undefined(),
        null|bool|Undefined $emailVerified = new Undefined(),
        null|string|Undefined $phoneNumber = new Undefined(),
        null|bool|Undefined $phoneNumberVerified = new Undefined(),
        null|string|Undefined $imageUrl = new Undefined(),
        null|string|Undefined $currencyCode = new Undefined(),
        null|string|Undefined $languageCode = new Undefined(),
        null|string|Undefined $regionCode = new Undefined(),
        null|string|Undefined $timeZone = new Undefined(),
        null|Address|Undefined $address = new Undefined(),
        null|\DateTimeInterface|Undefined $signupTime = new Undefined(),
        null|bool|Undefined $disabled = new Undefined(),
        ?bool $allowMissing = null,
    ): User {
        $req = new Request('admin.users.update', 'PATCH', '/admin/v1/users/'.rawurlencode($userId));
        $req->setIdempotent(true);

        $body = [];

        if (!empty($allowMissing)) {
            $req->setQuery('allowMissing', $allowMissing);
        }
        if (!$uniqueId instanceof Undefined) {
            $body['uniqueId'] = $uniqueId;
        }
        if (!$displayName instanceof Undefined) {
            $body['displayName'] = $displayName;
        }
        if (!$email instanceof Undefined) {
            $body['email'] = $email;
        }
        if (!$emailVerified instanceof Undefined) {
            $body['emailVerified'] = $emailVerified;
        }
        if (!$phoneNumber instanceof Undefined) {
            $body['phoneNumber'] = $phoneNumber;
        }
        if (!$phoneNumberVerified instanceof Undefined) {
            $body['phoneNumberVerified'] = $phoneNumberVerified;
        }
        if (!$imageUrl instanceof Undefined) {
            $body['imageUrl'] = $imageUrl;
        }
        if (!$currencyCode instanceof Undefined) {
            $body['currencyCode'] = $currencyCode;
        }
        if (!$languageCode instanceof Undefined) {
            $body['languageCode'] = $languageCode;
        }
        if (!$regionCode instanceof Undefined) {
            $body['regionCode'] = $regionCode;
        }
        if (!$timeZone instanceof Undefined) {
            $body['timeZone'] = $timeZone;
        }
        if (!$address instanceof Undefined) {
            $body['address'] = $address;
        }
        if (!$signupTime instanceof Undefined) {
            $body['signupTime'] = Util::encodeDateTime($signupTime);
        }
        if (!$disabled instanceof Undefined) {
            $body['disabled'] = $disabled;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Marks specified user for deletion.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function delete(
        string $userId,
    ): User {
        $req = new Request('admin.users.delete', 'DELETE', '/admin/v1/users/'.rawurlencode($userId));
        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Un-marks specified user for deletion.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function undelete(
        string $userId,
    ): User {
        $req = new Request('admin.users.undelete', 'POST', '/admin/v1/users/'.rawurlencode($userId).':undelete');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Hard delete the specified user.
     *
     * The user must be marked for deletion before it can be purged.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function purge(
        string $userId,
    ): PurgeUserResponse {
        $req = new Request('admin.users.purge', 'POST', '/admin/v1/users/'.rawurlencode($userId).':purge');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PurgeUserResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Connect specified user to external account.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function connect(
        string $userId,
        ?string $connectionId = null,
        ?string $externalId = null,
    ): User {
        $req = new Request('admin.users.connect', 'POST', '/admin/v1/users/'.rawurlencode($userId).':connect');
        $body = [];

        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (!empty($externalId)) {
            $body['externalId'] = $externalId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Disconnect specified user from external account.
     *
     * This will delete all the data associated with the connected account, including
     * payment methods, invoices, and subscriptions.
     *
     * If the delete external account option is enabled it will also attempt to delete
     * the external account (e.g. Stripe Customer object).
     *
     * WARNING: This can irreversibly destroy data and should be
     * used with extreme caution.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function disconnect(
        string $userId,
        ?string $connectionId = null,
        ?bool $deleteExternalAccount = null,
    ): User {
        $req = new Request('admin.users.disconnect', 'POST', '/admin/v1/users/'.rawurlencode($userId).':disconnect');
        $body = [];

        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (!empty($deleteExternalAccount)) {
            $body['deleteExternalAccount'] = $deleteExternalAccount;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Import user from external identity provider if they don't already
     * exist.
     *
     * If the user already exists in UserHub, this is a no-op.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function importAccount(
        string $userId,
    ): User {
        $req = new Request('admin.users.importAccount', 'POST', '/admin/v1/users/'.rawurlencode($userId).':import');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create a User API session.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createApiSession(
        string $userId,
    ): CreateApiSessionResponse {
        $req = new Request('admin.users.createApiSession', 'POST', '/admin/v1/users/'.rawurlencode($userId).':createApiSession');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return CreateApiSessionResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create Portal session.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function createPortalSession(
        string $userId,
        ?string $portalUrl = null,
        ?string $returnUrl = null,
        ?string $successUrl = null,
        ?string $organizationId = null,
    ): CreatePortalSessionResponse {
        $req = new Request('admin.users.createPortalSession', 'POST', '/admin/v1/users/'.rawurlencode($userId).':createPortalSession');
        $req->setIdempotent(true);

        $body = [];

        if (!empty($portalUrl)) {
            $body['portalUrl'] = $portalUrl;
        }
        if (!empty($returnUrl)) {
            $body['returnUrl'] = $returnUrl;
        }
        if (!empty($successUrl)) {
            $body['successUrl'] = $successUrl;
        }
        if (!empty($organizationId)) {
            $body['organizationId'] = $organizationId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return CreatePortalSessionResponse::jsonUnserialize($res->decodeBody());
    }
}
