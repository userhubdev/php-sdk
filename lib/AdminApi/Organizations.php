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
