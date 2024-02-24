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
final class UsersTest extends TestCase
{
    public function testList(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "users": [
                {
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
                  "signupTime": "2024-02-05T23:07:46.483Z",
                  "disabled": true,
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "nextPageToken": "string",
              "previousPageToken": "string"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->list();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/admin/v1/users', $tr->request->path);
    }

    public function testCreate(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->create();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/users', $tr->request->path);
    }

    public function testGet(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->get(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId', $tr->request->path);
    }

    public function testUpdate(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->update(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('PATCH', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId', $tr->request->path);
    }

    public function testDelete(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->delete(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('DELETE', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId', $tr->request->path);
    }

    public function testUndelete(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->undelete(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId:undelete', $tr->request->path);
    }

    public function testConnect(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->connect(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId:connect', $tr->request->path);
    }

    public function testDisconnect(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->disconnect(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId:disconnect', $tr->request->path);
    }

    public function testImportAccount(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
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
                "lines": [
                  "string"
                ],
                "city": "Brooklyn",
                "state": "string",
                "postalCode": "11222",
                "country": "US"
              },
              "accountConnections": [
                {
                  "externalId": "string",
                  "adminUrl": "https://example.com",
                  "state": "ACTIVE",
                  "stateReason": "DELETED",
                  "balanceAmount": "string",
                  "currencyCode": "USD",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "pushTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                }
              },
              "memberships": [
                {
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "signupTime": "2024-02-05T23:07:46.483Z",
              "disabled": true,
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->importAccount(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId:import', $tr->request->path);
    }

    public function testCreateApiSession(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "accessToken": "string",
              "expireTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->createApiSession(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId:createApiSession', $tr->request->path);
    }

    public function testCreatePortalSession(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "redirectUrl": "https://example.com"
            }
            EOD;

        $n = new Users($tr);

        $res = $n->createPortalSession(userId: 'userId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/admin/v1/users/userId:createPortalSession', $tr->request->path);
    }
}
