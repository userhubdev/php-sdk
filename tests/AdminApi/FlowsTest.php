<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use PHPUnit\Framework\TestCase;
use UserHub\Internal\TestTransport;

/**
 * @internal
 *
 * @coversNothing
 */
final class FlowsTest extends TestCase
{
    public function testList(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "flows": [
                {
                  "id": "string",
                  "state": "START_PENDING",
                  "stateReason": "DELETED",
                  "type": "JOIN_ORGANIZATION",
                  "startTime": "2024-02-05T23:07:46.483Z",
                  "expireTime": "2024-02-05T23:07:46.483Z",
                  "ttl": "string",
                  "secret": "string",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "nextPageToken": "string",
              "previousPageToken": "string"
            }
            EOD;

        $n = new Flows($tr);

        $res = $n->list();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/admin/v1/flows', $tr->request->path);
    }

    public function testCreateJoinOrganization(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "state": "START_PENDING",
              "stateReason": "DELETED",
              "type": "JOIN_ORGANIZATION",
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
              "creator": {
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
              "startTime": "2024-02-05T23:07:46.483Z",
              "expireTime": "2024-02-05T23:07:46.483Z",
              "ttl": "string",
              "secret": "string",
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z",
              "joinOrganization": {
                "displayName": "Test",
                "email": "test@example.com"
              },
              "signup": {
                "email": "test@example.com",
                "displayName": "Test",
                "createOrganization": true
              }
            }
            EOD;

        $n = new Flows($tr);

        $res = $n->createJoinOrganization();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/flows:createJoinOrganization', $tr->request->path);
    }

    public function testCreateSignup(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "state": "START_PENDING",
              "stateReason": "DELETED",
              "type": "JOIN_ORGANIZATION",
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
              "creator": {
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
              "startTime": "2024-02-05T23:07:46.483Z",
              "expireTime": "2024-02-05T23:07:46.483Z",
              "ttl": "string",
              "secret": "string",
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z",
              "joinOrganization": {
                "displayName": "Test",
                "email": "test@example.com"
              },
              "signup": {
                "email": "test@example.com",
                "displayName": "Test",
                "createOrganization": true
              }
            }
            EOD;

        $n = new Flows($tr);

        $res = $n->createSignup();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/flows:createSignup', $tr->request->path);
    }

    public function testGet(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "state": "START_PENDING",
              "stateReason": "DELETED",
              "type": "JOIN_ORGANIZATION",
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
              "creator": {
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
              "startTime": "2024-02-05T23:07:46.483Z",
              "expireTime": "2024-02-05T23:07:46.483Z",
              "ttl": "string",
              "secret": "string",
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z",
              "joinOrganization": {
                "displayName": "Test",
                "email": "test@example.com"
              },
              "signup": {
                "email": "test@example.com",
                "displayName": "Test",
                "createOrganization": true
              }
            }
            EOD;

        $n = new Flows($tr);

        $res = $n->get(flowId: 'flowId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/admin/v1/flows/flowId', $tr->request->path);
    }

    public function testCancel(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "state": "START_PENDING",
              "stateReason": "DELETED",
              "type": "JOIN_ORGANIZATION",
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
              "creator": {
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
              "startTime": "2024-02-05T23:07:46.483Z",
              "expireTime": "2024-02-05T23:07:46.483Z",
              "ttl": "string",
              "secret": "string",
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z",
              "joinOrganization": {
                "displayName": "Test",
                "email": "test@example.com"
              },
              "signup": {
                "email": "test@example.com",
                "displayName": "Test",
                "createOrganization": true
              }
            }
            EOD;

        $n = new Flows($tr);

        $res = $n->cancel(flowId: 'flowId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/flows/flowId:cancel', $tr->request->path);
    }
}
