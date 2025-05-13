<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\CreateApiSessionResponse;
use UserHub\AdminV1\CreatePortalSessionResponse;
use UserHub\AdminV1\ListUsersResponse;
use UserHub\AdminV1\PurgeUserResponse;
use UserHub\AdminV1\ReportUserEventResponse;
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
     * List users.
     *
     * @param null|string $displayName Filter the results by display name.
     *                                 To enable prefix filtering append `*` to the end of the value
     *                                 and ensure you provide at least 3 characters excluding the
     *                                 wildcard.
     *                                 This filter is case-insensitivity.
     * @param null|string $email       Filter the results by email address.
     *                                 To enable prefix filtering append `*` to the end of the value
     *                                 and ensure you provide at least 3 characters excluding the
     *                                 wildcard.
     *                                 This filter is case-insensitivity.
     * @param null|int    $pageSize    The maximum number of users to return. The API may return fewer than
     *                                 this value.
     *                                 If unspecified, at most 20 users will be returned.
     *                                 The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken   A page token, received from a previous list users call.
     *                                 Provide this to retrieve the subsequent page.
     *                                 When paginating, all other parameters provided to list users must match
     *                                 the call that provided the page token.
     * @param null|string $orderBy     a comma-separated list of fields to order by
     * @param null|bool   $showDeleted whether to show deleted users
     * @param null|string $view        The User view to return in the results.
     *                                 This defaults to the `BASIC` view.
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
     * Create a user.
     *
     * @param null|string             $uniqueId            The client defined unique identifier of the user account.
     *                                                     It is restricted to letters, numbers, underscores, and hyphens,
     *                                                     with the first character a letter or a number, and a 255
     *                                                     character maximum.
     *                                                     ID's starting with `usr_` are reserved.
     * @param null|string             $displayName         The human-readable display name of the user.
     *                                                     The maximum length is 200 characters.
     * @param null|string             $email               The email address of the user.
     *                                                     The maximum length is 320 characters.
     * @param null|bool               $emailVerified       whether the user's email address has been verified
     * @param null|string             $phoneNumber         The E164 phone number for the user (e.g. `+12125550123`).
     * @param null|bool               $phoneNumberVerified whether the user's phone number has been verified
     * @param null|string             $imageUrl            The photo/avatar URL of the user.
     *                                                     The maximum length is 2000 characters.
     * @param null|string             $currencyCode        The default ISO-4217 currency code for the user (e.g. `USD`).
     * @param null|string             $languageCode        The IETF BCP-47 language code for the user (e.g. `en`).
     * @param null|string             $regionCode          The country/region code for the user (e.g. `US`).
     * @param null|string             $timeZone            The IANA time zone for the user (e.g. `America/New_York`).
     * @param null|Address            $address             the default address for the user
     * @param null|\DateTimeInterface $signupTime          the sign-up time for the user
     * @param null|bool               $disabled            whether the user is disabled
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
     * Get a user.
     *
     * @param string $userId the identifier of the user
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
     * Update a user.
     *
     * @param string                            $userId              the identifier of the user
     * @param null|bool                         $allowMissing        If set to true, and the user is not found, a new user will be created.
     *                                                               You must use the unique identifier for the identifier when this is true.
     * @param null|string|Undefined             $uniqueId            The client defined unique identifier of the user account.
     *                                                               It is restricted to letters, numbers, underscores, and hyphens,
     *                                                               with the first character a letter or a number, and a 255
     *                                                               character maximum.
     *                                                               ID's starting with `usr_` are reserved.
     * @param null|string|Undefined             $displayName         The human-readable display name of the user.
     *                                                               The maximum length is 200 characters.
     * @param null|string|Undefined             $email               The email address of the user.
     *                                                               The maximum length is 320 characters.
     * @param null|bool|Undefined               $emailVerified       whether the user's email address has been verified
     * @param null|string|Undefined             $phoneNumber         The E164 phone number for the user (e.g. `+12125550123`).
     * @param null|bool|Undefined               $phoneNumberVerified whether the user's phone number has been verified
     * @param null|string|Undefined             $imageUrl            The photo/avatar URL of the user.
     *                                                               The maximum length is 2000 characters.
     * @param null|string|Undefined             $currencyCode        The default ISO-4217 currency code for the user (e.g. `USD`).
     * @param null|string|Undefined             $languageCode        The IETF BCP-47 language code for the user (e.g. `en`).
     * @param null|string|Undefined             $regionCode          The country/region code for the user (e.g. `US`).
     * @param null|string|Undefined             $timeZone            The IANA time zone for the user (e.g. `America/New_York`).
     * @param null|Address|Undefined            $address             the default address for the user
     * @param null|\DateTimeInterface|Undefined $signupTime          the sign-up time for the user
     * @param null|bool|Undefined               $disabled            whether the user is disabled
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
     * Delete a user.
     *
     * This marks the user for deletion and can be restored during
     * a grace period.
     *
     * To immediately delete a user, you must also call purge user.
     *
     * @param string $userId the identifier of the user
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
     * Restore a user.
     *
     * @param string $userId the identifier of the user
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
     * Purge a deleted user.
     *
     * The user must be marked for deletion before it can be purged.
     *
     * @param string $userId the identifier of the user
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
     * Connect a user to an external account.
     *
     * @param string      $userId       the user identifier
     * @param null|string $connectionId the identifier of the connection
     * @param null|string $externalId   The external identifier of the user to connect.
     *                                  On create if this is empty a new external user will
     *                                  be created if the connection supports it.
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
     * Update a user's external account.
     *
     * @param string                 $userId              the identifier of the user
     * @param null|string            $connectionId        the system-assigned identifier for the connection of the external account
     * @param null|string|Undefined  $displayName         The human-readable display name of the external account.
     *                                                    The maximum length is 200 characters.
     *                                                    This might be further restricted by the external provider.
     * @param null|string|Undefined  $email               The email address of the external account.
     *                                                    The maximum length is 320 characters.
     *                                                    This might be further restricted by the external provider.
     * @param null|bool|Undefined    $emailVerified       whether the external account's email address has been verified
     * @param null|string|Undefined  $phoneNumber         The E164 phone number for the external account (e.g. `+12125550123`).
     * @param null|bool|Undefined    $phoneNumberVerified whether the external account's phone number has been verified
     * @param null|string|Undefined  $currencyCode        The default ISO-4217 currency code for the external account (e.g. `USD`).
     * @param null|Address|Undefined $address             the billing address for the external account
     * @param null|bool|Undefined    $disabled            whether the external account is disabled
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function updateConnection(
        string $userId,
        ?string $connectionId = null,
        null|string|Undefined $displayName = new Undefined(),
        null|string|Undefined $email = new Undefined(),
        null|bool|Undefined $emailVerified = new Undefined(),
        null|string|Undefined $phoneNumber = new Undefined(),
        null|bool|Undefined $phoneNumberVerified = new Undefined(),
        null|string|Undefined $currencyCode = new Undefined(),
        null|Address|Undefined $address = new Undefined(),
        null|bool|Undefined $disabled = new Undefined(),
    ): User {
        $req = new Request('admin.users.updateConnection', 'PATCH', '/admin/v1/users/'.rawurlencode($userId).':updateConnection');
        $req->setIdempotent(true);

        $body = [];

        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
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
        if (!$currencyCode instanceof Undefined) {
            $body['currencyCode'] = $currencyCode;
        }
        if (!$address instanceof Undefined) {
            $body['address'] = $address;
        }
        if (!$disabled instanceof Undefined) {
            $body['disabled'] = $disabled;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return User::jsonUnserialize($res->decodeBody());
    }

    /**
     * Disconnect a user from an external account.
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
     * @param string      $userId                the user identifier
     * @param null|string $connectionId          the identifier of the connection
     * @param null|bool   $deleteExternalAccount Whether to attempt to delete the external account and all
     *                                           it's associated data (e.g. Stripe Customer object).
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
     * Import a user from a user provider.
     *
     * If the user already exists, this is a no-op.
     *
     * @param string $userId The identifier of the user.
     *                       This must be in the format `<externalId>@<connectionId>` where
     *                       `externalId` is the identity provider user identifier and
     *                       and `connectionId` is the User provider connection identifier.
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
     * Report a user event.
     *
     * If the `<externalId>@<connectionId>` user identifier syntax is
     * used and the user doesn't exist, they will be imported.
     *
     * By default, the event is processed asynchronously.
     *
     * @param string      $userId The identifier of the user.
     *                            This can be in the format `<externalId>@<connectionId>` where
     *                            `externalId` is the identity provider user identifier and
     *                            and `connectionId` is the User provider connection identifier.
     * @param null|string $type   The event type.
     *                            If not specified, this defaults to `CHANGED`.
     * @param null|bool   $wait   Process the user action synchronously.
     *                            Otherwise the action is processed in the background and errors
     *                            won't be returned.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function reportEvent(
        string $userId,
        ?string $type = null,
        ?bool $wait = null,
    ): ReportUserEventResponse {
        $req = new Request('admin.users.reportEvent', 'POST', '/admin/v1/users/'.rawurlencode($userId).':event');
        $body = [];

        if (!empty($type)) {
            $body['type'] = $type;
        }
        if (!empty($wait)) {
            $body['wait'] = $wait;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return ReportUserEventResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Create a User API session.
     *
     * @param string $userId the identifier of the user
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
     * Create a Portal session.
     *
     * @param string      $userId         The user ID.
     *                                    In addition to supporting the UserHub user ID,
     *                                    you can also pass in the User provider external identifier in the
     *                                    format `<externalId>@<connectionId>` and if the user doesn't
     *                                    exist in UserHub they will automatically be imported.
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
     *                                    * `/{accountId}/cancel` - cancel current plan
     *                                    * `/{accountId}/members` - manage organization members
     *                                    * `/{accountId}/invite` - invite a user to an organization
     * @param null|string $returnUrl      The URL the user should be sent to when they want to return to
     *                                    the app (e.g. cancel checkout).
     *                                    If not defined the app URL will be used.
     * @param null|string $successUrl     The URL the user should be sent after they successfully complete
     *                                    an action (e.g. checkout).
     *                                    If not defined the return URL will be used.
     * @param null|string $organizationId The organization ID.
     *                                    When specified the `{accountId}` in the `portalUrl` will be
     *                                    replaced with the organization ID, otherwise the user ID
     *                                    will be used.
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
