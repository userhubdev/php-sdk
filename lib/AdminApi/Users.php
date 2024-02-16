<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminApi;

use UserHub\AdminV1\CreateApiSessionResponse;
use UserHub\AdminV1\CreatePortalSessionResponse;
use UserHub\AdminV1\ListUsersResponse;
use UserHub\AdminV1\User;
use UserHub\CommonV1\Address;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Internal\Util;
use UserHub\Undefined;

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
     */
    public function list(
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
        null|bool $showDeleted = null,
        null|string $view = null,
    ): ListUsersResponse {
        $req = new Request('admin.users.list', 'GET', '/admin/v1/users');
        $req->setIdempotent(true);

        if (isset($pageSize)) {
            $req->setQuery('pageSize', $pageSize);
        }
        if (isset($pageToken)) {
            $req->setQuery('pageToken', $pageToken);
        }
        if (isset($orderBy)) {
            $req->setQuery('orderBy', $orderBy);
        }
        if (isset($showDeleted)) {
            $req->setQuery('showDeleted', $showDeleted);
        }
        if (isset($view)) {
            $req->setQuery('view', $view);
        }

        $res = $this->transport->execute($req);

        return $res->decodeBody([ListUsersResponse::class, 'jsonUnserialize']);
    }

    /**
     * Creates a new user.
     */
    public function create(
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $email = null,
        null|bool $emailVerified = null,
        null|string $phoneNumber = null,
        null|bool $phoneNumberVerified = null,
        null|string $imageUrl = null,
        null|string $currencyCode = null,
        null|string $languageCode = null,
        null|string $regionCode = null,
        null|string $timeZone = null,
        null|Address $address = null,
        null|\DateTimeInterface $signupTime = null,
        null|bool $disabled = null,
    ): User {
        $req = new Request('admin.users.create', 'POST', '/admin/v1/users');
        $body = [];

        if (isset($uniqueId)) {
            $body['uniqueId'] = $uniqueId;
        }
        if (isset($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (isset($email)) {
            $body['email'] = $email;
        }
        if (isset($emailVerified)) {
            $body['emailVerified'] = $emailVerified;
        }
        if (isset($phoneNumber)) {
            $body['phoneNumber'] = $phoneNumber;
        }
        if (isset($phoneNumberVerified)) {
            $body['phoneNumberVerified'] = $phoneNumberVerified;
        }
        if (isset($imageUrl)) {
            $body['imageUrl'] = $imageUrl;
        }
        if (isset($currencyCode)) {
            $body['currencyCode'] = $currencyCode;
        }
        if (isset($languageCode)) {
            $body['languageCode'] = $languageCode;
        }
        if (isset($regionCode)) {
            $body['regionCode'] = $regionCode;
        }
        if (isset($timeZone)) {
            $body['timeZone'] = $timeZone;
        }
        if (isset($address)) {
            $body['address'] = $address;
        }
        if (isset($signupTime)) {
            $body['signupTime'] = Util::encodeDateTime($signupTime);
        }
        if (isset($disabled)) {
            $body['disabled'] = $disabled;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
    }

    /**
     * Retrieves specified user.
     */
    public function get(
        string $userId,
    ): User {
        $req = new Request('admin.users.get', 'GET', '/admin/v1/users/'.rawurlencode($userId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
    }

    /**
     * Updates specified user.
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
        null|bool $allowMissing = null,
    ): User {
        $req = new Request('admin.users.update', 'PATCH', '/admin/v1/users/'.rawurlencode($userId));
        $req->setIdempotent(true);

        $body = [];

        if (isset($allowMissing)) {
            $req->setQuery('allowMissing', $allowMissing);
        }
        if (!Undefined::is($uniqueId)) {
            $body['uniqueId'] = $uniqueId;
        }
        if (!Undefined::is($displayName)) {
            $body['displayName'] = $displayName;
        }
        if (!Undefined::is($email)) {
            $body['email'] = $email;
        }
        if (!Undefined::is($emailVerified)) {
            $body['emailVerified'] = $emailVerified;
        }
        if (!Undefined::is($phoneNumber)) {
            $body['phoneNumber'] = $phoneNumber;
        }
        if (!Undefined::is($phoneNumberVerified)) {
            $body['phoneNumberVerified'] = $phoneNumberVerified;
        }
        if (!Undefined::is($imageUrl)) {
            $body['imageUrl'] = $imageUrl;
        }
        if (!Undefined::is($currencyCode)) {
            $body['currencyCode'] = $currencyCode;
        }
        if (!Undefined::is($languageCode)) {
            $body['languageCode'] = $languageCode;
        }
        if (!Undefined::is($regionCode)) {
            $body['regionCode'] = $regionCode;
        }
        if (!Undefined::is($timeZone)) {
            $body['timeZone'] = $timeZone;
        }
        if (!Undefined::is($address)) {
            $body['address'] = $address;
        }
        if (!Undefined::is($signupTime)) {
            $body['signupTime'] = Util::encodeDateTime($signupTime);
        }
        if (!Undefined::is($disabled)) {
            $body['disabled'] = $disabled;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
    }

    /**
     * Marks specified user for deletion.
     */
    public function delete(
        string $userId,
    ): User {
        $req = new Request('admin.users.delete', 'DELETE', '/admin/v1/users/'.rawurlencode($userId));
        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
    }

    /**
     * Un-marks specified user for deletion.
     */
    public function undelete(
        string $userId,
    ): User {
        $req = new Request('admin.users.undelete', 'POST', '/admin/v1/users/'.rawurlencode($userId).':undelete');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
    }

    /**
     * Connect specified user to external account.
     */
    public function connect(
        string $userId,
        null|string $connectionId = null,
        null|string $externalId = null,
    ): User {
        $req = new Request('admin.users.connect', 'POST', '/admin/v1/users/'.rawurlencode($userId).':connect');
        $body = [];

        if (isset($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (isset($externalId)) {
            $body['externalId'] = $externalId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
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
     */
    public function disconnect(
        string $userId,
        null|string $connectionId = null,
        null|bool $deleteExternalAccount = null,
    ): User {
        $req = new Request('admin.users.disconnect', 'POST', '/admin/v1/users/'.rawurlencode($userId).':disconnect');
        $body = [];

        if (isset($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (isset($deleteExternalAccount)) {
            $body['deleteExternalAccount'] = $deleteExternalAccount;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
    }

    /**
     * Import user from external identity provider if they don't already
     * exist.
     *
     * If the user already exists in UserHub, this is a no-op.
     */
    public function importAccount(
        string $userId,
    ): User {
        $req = new Request('admin.users.importAccount', 'POST', '/admin/v1/users/'.rawurlencode($userId).':import');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([User::class, 'jsonUnserialize']);
    }

    /**
     * Create a User API session.
     */
    public function createApiSession(
        string $userId,
    ): CreateApiSessionResponse {
        $req = new Request('admin.users.createApiSession', 'POST', '/admin/v1/users/'.rawurlencode($userId).':createApiSession');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([CreateApiSessionResponse::class, 'jsonUnserialize']);
    }

    /**
     * Create Portal session.
     */
    public function createPortalSession(
        string $userId,
        null|string $portalUrl = null,
        null|string $returnUrl = null,
        null|string $successUrl = null,
    ): CreatePortalSessionResponse {
        $req = new Request('admin.users.createPortalSession', 'POST', '/admin/v1/users/'.rawurlencode($userId).':createPortalSession');
        $req->setIdempotent(true);

        $body = [];

        if (isset($portalUrl)) {
            $body['portalUrl'] = $portalUrl;
        }
        if (isset($returnUrl)) {
            $body['returnUrl'] = $returnUrl;
        }
        if (isset($successUrl)) {
            $body['successUrl'] = $successUrl;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([CreatePortalSessionResponse::class, 'jsonUnserialize']);
    }
}
