<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserApi;

use PHPUnit\Framework\TestCase;
use UserHub\Internal\TestTransport;

/**
 * @internal
 *
 * @coversNothing
 */
class OrganizationsTest extends TestCase
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
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/user/v1/organizations', $tr->request->path);
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
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/user/v1/organizations', $tr->request->path);
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
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/user/v1/organizations/organizationId', $tr->request->path);
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
        $this->assertNotNull($res);
        $this->assertEquals('PATCH', $tr->request->method);
        $this->assertEquals('/user/v1/organizations/organizationId', $tr->request->path);
    }

    public function testDelete(): void
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

        $res = $n->delete(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('DELETE', $tr->request->method);
        $this->assertEquals('/user/v1/organizations/organizationId', $tr->request->path);
    }

    public function testLeave(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{}
EOD;

        $n = new Organizations($tr);

        $res = $n->leave(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('DELETE', $tr->request->method);
        $this->assertEquals('/user/v1/organizations/organizationId:leave', $tr->request->path);
    }
}
