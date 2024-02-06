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
class FlowsTest extends TestCase
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
      "expireTime": "2024-02-05T23:07:46.483Z",
      "createTime": "2024-02-05T23:07:46.483Z"
    }
  ],
  "nextPageToken": "string",
  "previousPageToken": "string"
}
EOD;

        $n = new Flows($tr);

        $res = $n->list();
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/user/v1/flows', $tr->request->path);
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
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "user": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "creator": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "expireTime": "2024-02-05T23:07:46.483Z",
  "createTime": "2024-02-05T23:07:46.483Z",
  "joinOrganization": {
    "displayName": "Test",
    "email": "test@example.com"
  },
  "signup": {
    "email": "test@example.com",
    "displayName": "Test"
  }
}
EOD;

        $n = new Flows($tr);

        $res = $n->createJoinOrganization();
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/user/v1/flows:createJoinOrganization', $tr->request->path);
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
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "user": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "creator": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "expireTime": "2024-02-05T23:07:46.483Z",
  "createTime": "2024-02-05T23:07:46.483Z",
  "joinOrganization": {
    "displayName": "Test",
    "email": "test@example.com"
  },
  "signup": {
    "email": "test@example.com",
    "displayName": "Test"
  }
}
EOD;

        $n = new Flows($tr);

        $res = $n->get(flowId: 'flowId');
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/user/v1/flows/flowId', $tr->request->path);
    }

    public function testConsume(): void
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
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "user": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "creator": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "expireTime": "2024-02-05T23:07:46.483Z",
  "createTime": "2024-02-05T23:07:46.483Z",
  "joinOrganization": {
    "displayName": "Test",
    "email": "test@example.com"
  },
  "signup": {
    "email": "test@example.com",
    "displayName": "Test"
  }
}
EOD;

        $n = new Flows($tr);

        $res = $n->consume(flowId: 'flowId');
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/user/v1/flows/flowId:consume', $tr->request->path);
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
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "user": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "creator": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "email": "test@example.com",
    "emailVerified": true,
    "imageUrl": "https://example.com/test.png",
    "disabled": true
  },
  "expireTime": "2024-02-05T23:07:46.483Z",
  "createTime": "2024-02-05T23:07:46.483Z",
  "joinOrganization": {
    "displayName": "Test",
    "email": "test@example.com"
  },
  "signup": {
    "email": "test@example.com",
    "displayName": "Test"
  }
}
EOD;

        $n = new Flows($tr);

        $res = $n->cancel(flowId: 'flowId');
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/user/v1/flows/flowId:cancel', $tr->request->path);
    }
}
