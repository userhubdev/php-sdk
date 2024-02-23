<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use PHPUnit\Framework\TestCase;
use UserHub\Internal\TestTransport;

/**
 * @internal
 *
 * @coversNothing
 */
final class SessionTest extends TestCase
{
    public function testGet(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "user": {
                "id": "string",
                "uniqueId": "test",
                "displayName": "Test",
                "email": "test@example.com",
                "emailVerified": true,
                "imageUrl": "https://example.com/test.png",
                "disabled": true
              },
              "memberships": [
                {}
              ],
              "subscription": {
                "id": "string",
                "state": "ACTIVE",
                "anchorTime": "2024-02-05T23:07:46.483Z",
                "plan": {
                  "id": "string",
                  "displayName": "Test"
                },
                "seat": {}
              },
              "expireTime": "2024-02-05T23:07:46.483Z",
              "scopes": [
                "string"
              ]
            }
            EOD;

        $n = new Session($tr);

        $res = $n->get();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/user/v1/session', $tr->request->path);
    }
}
