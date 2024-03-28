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
final class OrganizationsTest extends TestCase
{
    public function testList(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "organizations": [
                {
                  "id": "string",
                  "uniqueId": "test",
                  "displayName": "Test",
                  "email": "test@example.com",
                  "emailVerified": true,
                  "imageUrl": "https://example.com/test.png",
                  "disabled": true
                }
              ],
              "nextPageToken": "string",
              "previousPageToken": "string"
            }
            EOD;

        $n = new Organizations($tr);

        $res = $n->list();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/user/v1/organizations', $tr->request->path);
    }

    public function testCreate(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "uniqueId": "test",
              "displayName": "Test",
              "email": "test@example.com",
              "emailVerified": true,
              "imageUrl": "https://example.com/test.png",
              "disabled": true
            }
            EOD;

        $n = new Organizations($tr);

        $res = $n->create();
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('POST', $tr->request->method);
        self::assertEquals('/user/v1/organizations', $tr->request->path);
    }

    public function testGet(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "uniqueId": "test",
              "displayName": "Test",
              "email": "test@example.com",
              "emailVerified": true,
              "imageUrl": "https://example.com/test.png",
              "disabled": true
            }
            EOD;

        $n = new Organizations($tr);

        $res = $n->get(organizationId: 'organizationId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/user/v1/organizations/organizationId', $tr->request->path);
    }

    public function testUpdate(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "uniqueId": "test",
              "displayName": "Test",
              "email": "test@example.com",
              "emailVerified": true,
              "imageUrl": "https://example.com/test.png",
              "disabled": true
            }
            EOD;

        $n = new Organizations($tr);

        $res = $n->update(organizationId: 'organizationId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('PATCH', $tr->request->method);
        self::assertEquals('/user/v1/organizations/organizationId', $tr->request->path);
    }

    public function testDelete(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {}
            EOD;

        $n = new Organizations($tr);

        $res = $n->delete(organizationId: 'organizationId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('DELETE', $tr->request->method);
        self::assertEquals('/user/v1/organizations/organizationId', $tr->request->path);
    }

    public function testLeave(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {}
            EOD;

        $n = new Organizations($tr);

        $res = $n->leave(organizationId: 'organizationId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('DELETE', $tr->request->method);
        self::assertEquals('/user/v1/organizations/organizationId:leave', $tr->request->path);
    }
}
