<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\AdminV1\ListMembersResponse;
use UserHub\AdminV1\ListOrganizationsResponse;
use UserHub\AdminV1\Member;
use UserHub\AdminV1\Organization;
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
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
        null|bool $showDeleted = null,
        null|string $view = null,
    ): ListOrganizationsResponse {
        $req = new Request('admin.organizations.list', 'GET', '/admin/v1/organizations');
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

        return $res->decodeBody([ListOrganizationsResponse::class, 'jsonUnserialize']);
    }

    /**
     * Creates a new organization.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
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
    ): Organization {
        $req = new Request('admin.organizations.create', 'POST', '/admin/v1/organizations');
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

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
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

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
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
        null|bool $allowMissing = null,
    ): Organization {
        $req = new Request('admin.organizations.update', 'PATCH', '/admin/v1/organizations/'.rawurlencode($organizationId));
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

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
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

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
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

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Connect specified organization to external account.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function connect(
        string $organizationId,
        null|string $connectionId = null,
        null|string $externalId = null,
    ): Organization {
        $req = new Request('admin.organizations.connect', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).':connect');
        $body = [];

        if (isset($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (isset($externalId)) {
            $body['externalId'] = $externalId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
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
        null|string $connectionId = null,
        null|bool $deleteExternalAccount = null,
    ): Organization {
        $req = new Request('admin.organizations.disconnect', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).':disconnect');
        $body = [];

        if (isset($connectionId)) {
            $body['connectionId'] = $connectionId;
        }
        if (isset($deleteExternalAccount)) {
            $body['deleteExternalAccount'] = $deleteExternalAccount;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Organization::class, 'jsonUnserialize']);
    }

    /**
     * Lists organization members.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function listMembers(
        string $organizationId,
        null|int $pageSize = null,
        null|string $pageToken = null,
        null|string $orderBy = null,
    ): ListMembersResponse {
        $req = new Request('admin.organizations.listMembers', 'GET', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members');
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

        $res = $this->transport->execute($req);

        return $res->decodeBody([ListMembersResponse::class, 'jsonUnserialize']);
    }

    /**
     * Creates a new organization member.
     *
     * @throws UserHubError if the endpoint returns a non-2xx response or there was an error handling the request
     */
    public function addMember(
        string $organizationId,
        null|string $userId = null,
        null|string $roleId = null,
    ): Member {
        $req = new Request('admin.organizations.addMember', 'POST', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members');
        $body = [];

        if (isset($userId)) {
            $body['userId'] = $userId;
        }
        if (isset($roleId)) {
            $body['roleId'] = $roleId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Member::class, 'jsonUnserialize']);
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

        return $res->decodeBody([Member::class, 'jsonUnserialize']);
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
        null|bool $allowMissing = null,
    ): Member {
        $req = new Request('admin.organizations.updateMember', 'PATCH', '/admin/v1/organizations/'.rawurlencode($organizationId).'/members/'.rawurlencode($userId));
        $req->setIdempotent(true);

        $body = [];

        if (isset($allowMissing)) {
            $req->setQuery('allowMissing', $allowMissing);
        }
        if (!Undefined::is($roleId)) {
            $body['roleId'] = $roleId;
        }

        $req->setBody((object) $body);

        $res = $this->transport->execute($req);

        return $res->decodeBody([Member::class, 'jsonUnserialize']);
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

        return $res->decodeBody([EmptyResponse::class, 'jsonUnserialize']);
    }
}
