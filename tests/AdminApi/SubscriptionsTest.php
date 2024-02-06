<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminApi;

use PHPUnit\Framework\TestCase;
use UserHub\Internal\TestTransport;

/**
 * @internal
 *
 * @coversNothing
 */
class SubscriptionsTest extends TestCase
{
    public function testList(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{
  "subscriptions": [
    {
      "id": "string",
      "state": "ACTIVE",
      "stateReason": "DELETED",
      "externalId": "string",
      "currencyCode": "USD",
      "cancelPeriodEnd": true,
      "anchorTime": "2024-02-05T23:07:46.483Z",
      "startTime": "2024-02-05T23:07:46.483Z",
      "endTime": "2024-02-05T23:07:46.483Z",
      "default": true,
      "pullTime": "2024-02-05T23:07:46.483Z",
      "pushTime": "2024-02-05T23:07:46.483Z",
      "createTime": "2024-02-05T23:07:46.483Z",
      "updateTime": "2024-02-05T23:07:46.483Z"
    }
  ],
  "nextPageToken": "string",
  "previousPageToken": "string"
}
EOD;

        $n = new Subscriptions($tr);

        $res = $n->list();
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/admin/v1/subscriptions', $tr->request->path);
    }

    public function testGet(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{
  "id": "string",
  "state": "ACTIVE",
  "stateReason": "DELETED",
  "connection": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "state": "PENDING_SETUP",
    "stateReason": "DELETED",
    "type": "string",
    "delegate": {
      "id": "string",
      "uniqueId": "test",
      "displayName": "Test",
      "state": "PENDING_SETUP",
      "stateReason": "DELETED",
      "type": "string"
    },
    "providers": [],
    "createTime": "2024-02-05T23:07:46.483Z",
    "updateTime": "2024-02-05T23:07:46.483Z",
    "auth0": {
      "domain": "string",
      "clientId": "string",
      "clientSecret": "string"
    },
    "builtinEmail": {
      "allowedEmails": []
    },
    "googleCloudIdentityPlatform": {
      "credentials": "string",
      "projectId": "string"
    },
    "postmark": {
      "serverToken": "string",
      "serverId": "string",
      "allowedEmails": []
    },
    "stripe": {
      "accountId": "string",
      "live": true
    },
    "webhook": {
      "url": "https://example.com",
      "headers": {}
    }
  },
  "externalId": "string",
  "plan": {
    "id": "string",
    "displayName": "Test",
    "description": "string",
    "currencyCode": "USD",
    "billingInterval": {
      "quantity": 1,
      "unit": "DAY"
    },
    "tags": [
      "string"
    ],
    "items": []
  },
  "currencyCode": "USD",
  "items": [
    {
      "id": "string",
      "quantity": 1
    }
  ],
  "seats": [
    {
      "currentPeriodQuantity": 1,
      "nextPeriodQuantity": 1,
      "assignedQuantity": 1,
      "unassignedQuantity": 1,
      "totalQuantity": 1
    }
  ],
  "paymentMethod": {
    "id": "string",
    "externalId": "string",
    "state": "ACTIVE",
    "stateReason": "DELETED",
    "type": "string",
    "displayName": "Test",
    "fullName": "Test",
    "address": {
      "lines": [],
      "city": "Brooklyn",
      "state": "string",
      "postalCode": "11222",
      "country": "US"
    },
    "default": true,
    "pullTime": "2024-02-05T23:07:46.483Z",
    "createTime": "2024-02-05T23:07:46.483Z",
    "updateTime": "2024-02-05T23:07:46.483Z",
    "card": {
      "brand": "AMERICAN_EXPRESS",
      "last4": "string",
      "fundingType": "CREDIT"
    }
  },
  "cancelPeriodEnd": true,
  "anchorTime": "2024-02-05T23:07:46.483Z",
  "startTime": "2024-02-05T23:07:46.483Z",
  "endTime": "2024-02-05T23:07:46.483Z",
  "trial": {
    "startTime": "2024-02-05T23:07:46.483Z",
    "endTime": "2024-02-05T23:07:46.483Z",
    "days": 1,
    "remainingDays": 1
  },
  "currentPeriod": {
    "startTime": "2024-02-05T23:07:46.483Z",
    "endTime": "2024-02-05T23:07:46.483Z"
  },
  "organization": {
    "id": "string",
    "state": "ACTIVE",
    "stateReason": "DELETED",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "phoneNumber": "+12125550123",
    "phoneNumberVerified": true,
    "imageUrl": "https://example.com/test.png",
    "currencyCode": "USD",
    "languageCode": "en",
    "regionCode": "US",
    "timeZone": "America/New_York",
    "address": {
      "lines": [],
      "city": "Brooklyn",
      "state": "string",
      "postalCode": "11222",
      "country": "US"
    },
    "accountConnections": [],
    "subscription": {
      "id": "string",
      "state": "ACTIVE",
      "anchorTime": "2024-02-05T23:07:46.483Z"
    },
    "signupTime": "2024-02-05T23:07:46.483Z",
    "disabled": true,
    "createTime": "2024-02-05T23:07:46.483Z",
    "updateTime": "2024-02-05T23:07:46.483Z"
  },
  "user": {
    "id": "string",
    "state": "ACTIVE",
    "stateReason": "DELETED",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "phoneNumber": "+12125550123",
    "phoneNumberVerified": true,
    "imageUrl": "https://example.com/test.png",
    "currencyCode": "USD",
    "languageCode": "en",
    "regionCode": "US",
    "timeZone": "America/New_York",
    "address": {
      "lines": [],
      "city": "Brooklyn",
      "state": "string",
      "postalCode": "11222",
      "country": "US"
    },
    "accountConnections": [],
    "subscription": {
      "id": "string",
      "state": "ACTIVE",
      "anchorTime": "2024-02-05T23:07:46.483Z"
    },
    "memberships": [],
    "signupTime": "2024-02-05T23:07:46.483Z",
    "disabled": true,
    "createTime": "2024-02-05T23:07:46.483Z",
    "updateTime": "2024-02-05T23:07:46.483Z"
  },
  "default": true,
  "pullTime": "2024-02-05T23:07:46.483Z",
  "pushTime": "2024-02-05T23:07:46.483Z",
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Subscriptions($tr);

        $res = $n->get(subscriptionId: 'subscriptionId');
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/admin/v1/subscriptions/subscriptionId', $tr->request->path);
    }
}
