<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\ListMembersResponse;
use UserHub\AdminV1\ListOrganizationsResponse;
use UserHub\AdminV1\Member;
use UserHub\AdminV1\Organization;
use UserHub\AdminV1\PurgeOrganizationResponse;
use UserHub\ApiV1\EmptyResponse;
use UserHub\CommonV1\Address;
use UserHub\Internal\Request;
use UserHub\Internal\Transport;
use UserHub\Internal\Util;
use UserHub\Undefined;
use UserHub\UserHubError;

/**
 * The organization methods.
 */
class Organizations
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Lists organizations.
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
     * @param null|int    $pageSize    The maximum number of organizations to return. The API may return fewer than
     *                                 this value.
     *                                 If unspecified, at most 20 organizations will be returned.
     *                                 The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken   A page token, received from a previous list organizations call.
     *                                 Provide this to retrieve the subsequent page.
     *                                 When paginating, all other parameters provided to list organizations must match
     *                                 the call that provided the page token.
     * @param null|string $orderBy     A comma-separated list of fields to order by.
     *                                 Supports:
     *                                 - `displayName asc`
     *                                 - `email asc`
     *                                 - `signupTime desc`
     *                                 - `createTime desc`
     *                                 - `deleteTime desc`
     * @param null|bool   $showDeleted whether to show deleted organizations
     * @param null|string $view        The organization view to return in the results.
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
    ): ListOrganizationsResponse {
        $req = new Request('admin.organizations.list', 'GET', '/admin/v1/organizations');
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

        return ListOrganizationsResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Creates a new organization.
     *
     * @param null|string             $uniqueId            The client defined unique identifier of the organization account.
     *                                                     It is restricted to letters, numbers, underscores, and hyphens,
     *                                                     with the first character a letter or a number, and a 255
     *                                                     character maximum.
     *                                                     ID's starting with `org_` are reserved.
     * @param null|string             $displayName         The human-readable display name of the organization.
     *                                                     The maximum length is 200 characters.
     * @param null|string             $email               The email address of the organization.
     *                                                     The maximum length is 320 characters.
     * @param null|bool               $emailVerified       whether the organization's email address has been verified
     * @param null|string             $phoneNumber         The E164 phone number for the organization (e.g. `+12125550123`).
     * @param null|bool               $phoneNumberVerified whether the organization's phone number has been verified
     * @param null|string             $imageUrl            The photo/avatar URL of the organization.
     *                                                     The maximum length is 2000 characters.
     * @param null|string             $currencyCode        The default ISO-4217 currency code for the organization (e.g. `USD`).
     * @param null|string             $languageCode        The IETF BCP-47 language code for the organization (e.g. `en`).
     * @param null|string             $regionCode          The country/region code for the organization (e.g. `US`).
     * @param null|string             $timeZone            The IANA time zone for the organization (e.g. `America/New_York`).
     * @param null|Address            $address             the default address for the organization
     * @param null|\DateTimeInterface $signupTime          the sign-up time for the organization
     * @param null|bool               $disabled            whether the organization is disabled
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
    ): Organization {
        $req = new Request('admin.organizations.create', 'POST', '/admin/v1/organizations');
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

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Retrieves specified organization.
     *
     * @param string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function get(
        string $organizationId,
    ): Organization {
        $req = new Request('admin.organizations.get', 'GET', '/admin/v1/organizations/'.rawurlencode($organizationId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Updates specified organization.
     *
     * @param string                            $organizationId      the identifier of the organization
     * @param null|bool                         $allowMissing        If set to true, and the organization is not found, a new organization will be created.
     *                                                               You must use the unique identifier for the identifier when this is true.
     * @param null|string|Undefined             $uniqueId            The client defined unique identifier of the organization account.
     *                                                               It is restricted to letters, numbers, underscores, and hyphens,
     *                                                               with the first character a letter or a number, and a 255
     *                                                               character maximum.
     *                                                               ID's starting with `org_` are reserved.
     * @param null|string|Undefined             $displayName         The human-readable display name of the organization.
     *                                                               The maximum length is 200 characters.
     * @param null|string|Undefined             $email               The email address of the organization.
     *                                                               The maximum length is 320 characters.
     * @param null|bool|Undefined               $emailVerified       whether the organization's email address has been verified
     * @param null|string|Undefined             $phoneNumber         The E164 phone number for the organization (e.g. `+12125550123`).
     * @param null|bool|Undefined               $phoneNumberVerified whether the organization's phone number has been verified
     * @param null|string|Undefined             $imageUrl            The photo/avatar URL of the organization.
     *                                                               The maximum length is 2000 characters.
     * @param null|string|Undefined             $currencyCode        The default ISO-4217 currency code for the organization (e.g. `USD`).
     * @param null|string|Undefined             $languageCode        The IETF BCP-47 language code for the organization (e.g. `en`).
     * @param null|string|Undefined             $regionCode          The country/region code for the organization (e.g. `US`).
     * @param null|string|Undefined             $timeZone            The IANA time zone for the organization (e.g. `America/New_York`).
     * @param null|Address|Undefined            $address             the default address for the organization
     * @param null|\DateTimeInterface|Undefined $signupTime          the sign-up time for the organization
     * @param null|bool|Undefined               $disabled            whether the organization is disabled
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function update(
        string $organizationId,
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
    ): Organization {
        $req = new Request('admin.organizations.update', 'PATCH', '/admin/v1/organizations/'.rawurlencode($organizationId));
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

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Marks specified organization for deletion.
     *
     * @param string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function delete(
        string $organizationId,
    ): Organization {
        $req = new Request('admin.organizations.delete', 'DELETE', '/admin/v1/organizations/'.rawurlencode($organizationId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Un-marks specified organization for deletion.
     *
     * @param string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function undelete(
        string $organizationId,
    ): Organization {
        $req = new Request('admin.organizations.undelete', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).':undelete');
        $req->setIdempotent(true);

        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Hard delete the specified organization.
     *
     * The organization must be marked for deletion before it can be purged.
     *
     * @param string $organizationId the identifier of the organization
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function purge(
        string $organizationId,
    ): PurgeOrganizationResponse {
        $req = new Request('admin.organizations.purge', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).':purge');
        $body = [];

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return PurgeOrganizationResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Connect specified organization to external account.
     *
     * @param string      $organizationId the organization identifier
     * @param null|string $connectionId   the identifier of the connection
     * @param null|string $externalId     The external identifier of the organization to connect.
     *                                    On create if this is empty a new external organization will
     *                                    be created if the connection supports it.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function connect(
        string $organizationId,
        ?string $connectionId = null,
        ?string $externalId = null,
    ): Organization {
        $req = new Request('admin.organizations.connect', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).':connect');
        $body = [];

        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (!empty($externalId)) {
            $body['externalId'] = $externalId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Disconnect specified organization from external account.
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
     * @param string      $organizationId        the organization identifier
     * @param null|string $connectionId          the identifier of the connection
     * @param null|bool   $deleteExternalAccount Whether to attempt to delete the external account and all
     *                                           it's associated data (e.g. Stripe Customer object).
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function disconnect(
        string $organizationId,
        ?string $connectionId = null,
        ?bool $deleteExternalAccount = null,
    ): Organization {
        $req = new Request('admin.organizations.disconnect', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).':disconnect');
        $body = [];

        if (!empty($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (!empty($deleteExternalAccount)) {
            $body['deleteExternalAccount'] = $deleteExternalAccount;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Organization::jsonUnserialize($res->decodeBody());
    }

    /**
     * Lists organization members.
     *
     * @param string      $organizationId the identifier of the organization
     * @param null|string $displayName    Filter the results by display name.
     *                                    To enable prefix filtering append `*` to the end of the value
     *                                    and ensure you provide at least 3 characters excluding the
     *                                    wildcard.
     *                                    This filter is case-insensitivity.
     * @param null|string $email          Filter the results by email address.
     *                                    To enable prefix filtering append `*` to the end of the value
     *                                    and ensure you provide at least 3 characters excluding the
     *                                    wildcard.
     *                                    This filter is case-insensitivity.
     * @param null|string $roleId         filter the results by a role identifier
     * @param null|int    $pageSize       The maximum number of members to return. The API may return fewer than
     *                                    this value.
     *                                    If unspecified, at most 20 members will be returned.
     *                                    The maximum value is 100; values above 100 will be coerced to 100.
     * @param null|string $pageToken      A page token, received from a previous list members call.
     *                                    Provide this to retrieve the subsequent page.
     *                                    When paginating, all other parameters provided to list members must match
     *                                    the call that provided the page token.
     * @param null|string $orderBy        A comma-separated list of fields to order by.
     *                                    Supports:
     *                                    - `displayName asc`
     *                                    - `email asc`
     *                                    - `createTime desc`
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function listMembers(
        string $organizationId,
        ?string $displayName = null,
        ?string $email = null,
        ?string $roleId = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $orderBy = null,
    ): ListMembersResponse {
        $req = new Request('admin.organizations.listMembers', 'GET', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members');
        $req->setIdempotent(true);

        if (!empty($displayName)) {
            $req->setQuery('displayName', $displayName);
        }
        if (!empty($email)) {
            $req->setQuery('email', $email);
        }
        if (!empty($roleId)) {
            $req->setQuery('roleId', $roleId);
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

        $res = $this->transport->execute($req);

        return ListMembersResponse::jsonUnserialize($res->decodeBody());
    }

    /**
     * Creates a new organization member.
     *
     * @param string      $organizationId the identifier of the organization
     * @param null|string $userId         the identifier of the user
     * @param null|string $roleId         the identifier of the role
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function addMember(
        string $organizationId,
        ?string $userId = null,
        ?string $roleId = null,
    ): Member {
        $req = new Request('admin.organizations.addMember', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members');
        $body = [];

        if (!empty($userId)) {
            $body['userId'] = $userId;
        }
        if (!empty($roleId)) {
            $body['roleId'] = $roleId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Member::jsonUnserialize($res->decodeBody());
    }

    /**
     * Retrieves specified organization member.
     *
     * @param string $organizationId the identifier of the organization
     * @param string $userId         the identifier of the user
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function getMember(
        string $organizationId,
        string $userId,
    ): Member {
        $req = new Request('admin.organizations.getMember', 'GET', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members/'.rawurlencode($userId));
        $req->setIdempotent(true);

        $res = $this->transport->execute($req);

        return Member::jsonUnserialize($res->decodeBody());
    }

    /**
     * Updates specified organization member.
     *
     * @param string                $organizationId the identifier of the organization
     * @param string                $userId         the identifier of the user
     * @param null|bool             $allowMissing   if set to true, and the member is not found, a new member will be created
     * @param null|string|Undefined $roleId         the identifier of the role
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function updateMember(
        string $organizationId,
        string $userId,
        null|string|Undefined $roleId = new Undefined(),
        ?bool $allowMissing = null,
    ): Member {
        $req = new Request('admin.organizations.updateMember', 'PATCH', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members/'.rawurlencode($userId));
        $req->setIdempotent(true);

        $body = [];

        if (!empty($allowMissing)) {
            $req->setQuery('allowMissing', $allowMissing);
        }
        if (!$roleId instanceof Undefined) {
            $body['roleId'] = $roleId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return Member::jsonUnserialize($res->decodeBody());
    }

    /**
     * Deletes specified organization member.
     *
     * @param string $organizationId the identifier of the organization
     * @param string $userId         the identifier of the user
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function removeMember(
        string $organizationId,
        string $userId,
    ): EmptyResponse {
        $req = new Request('admin.organizations.removeMember', 'DELETE', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members/'.rawurlencode($userId));
        $res = $this->transport->execute($req);

        return EmptyResponse::jsonUnserialize($res->decodeBody());
    }
}
