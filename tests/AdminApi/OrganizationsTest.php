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

        $n = new Organizations($tr);

        $res = $n->list();
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations', $tr->request->path);
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
  "signupTime": "2024-02-05T23:07:46.483Z",
  "disabled": true,
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->create();
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations', $tr->request->path);
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
  "signupTime": "2024-02-05T23:07:46.483Z",
  "disabled": true,
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->get(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId', $tr->request->path);
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
  "signupTime": "2024-02-05T23:07:46.483Z",
  "disabled": true,
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->update(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('PATCH', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId', $tr->request->path);
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
  "signupTime": "2024-02-05T23:07:46.483Z",
  "disabled": true,
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->delete(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('DELETE', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId', $tr->request->path);
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
  "signupTime": "2024-02-05T23:07:46.483Z",
  "disabled": true,
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->undelete(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId:undelete', $tr->request->path);
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
  "signupTime": "2024-02-05T23:07:46.483Z",
  "disabled": true,
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->connect(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId:connect', $tr->request->path);
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
  "signupTime": "2024-02-05T23:07:46.483Z",
  "disabled": true,
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->disconnect(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId:disconnect', $tr->request->path);
    }

    public function testListMembers(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{
  "members": [
    {
      "state": "ACTIVE",
      "createTime": "2024-02-05T23:07:46.483Z",
      "updateTime": "2024-02-05T23:07:46.483Z"
    }
  ],
  "nextPageToken": "string",
  "previousPageToken": "string"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->listMembers(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId/members', $tr->request->path);
    }

    public function testAddMember(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{
  "state": "ACTIVE",
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
  "role": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "type": "OWNER",
    "description": "string",
    "permissionSets": [
      "string"
    ],
    "default": true,
    "archived": true,
    "createTime": "2024-02-05T23:07:46.483Z",
    "updateTime": "2024-02-05T23:07:46.483Z"
  },
  "seat": {
    "product": {
      "id": "string",
      "uniqueId": "test",
      "displayName": "Test"
    }
  },
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->addMember(organizationId: 'organizationId');
        $this->assertNotNull($res);
        $this->assertEquals('POST', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId/members', $tr->request->path);
    }

    public function testGetMember(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{
  "state": "ACTIVE",
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
  "role": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "type": "OWNER",
    "description": "string",
    "permissionSets": [
      "string"
    ],
    "default": true,
    "archived": true,
    "createTime": "2024-02-05T23:07:46.483Z",
    "updateTime": "2024-02-05T23:07:46.483Z"
  },
  "seat": {
    "product": {
      "id": "string",
      "uniqueId": "test",
      "displayName": "Test"
    }
  },
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->getMember(organizationId: 'organizationId', userId: 'userId');
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId/members/userId', $tr->request->path);
    }

    public function testUpdateMember(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{
  "state": "ACTIVE",
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
  "role": {
    "id": "string",
    "uniqueId": "test",
    "displayName": "Test",
    "type": "OWNER",
    "description": "string",
    "permissionSets": [
      "string"
    ],
    "default": true,
    "archived": true,
    "createTime": "2024-02-05T23:07:46.483Z",
    "updateTime": "2024-02-05T23:07:46.483Z"
  },
  "seat": {
    "product": {
      "id": "string",
      "uniqueId": "test",
      "displayName": "Test"
    }
  },
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Organizations($tr);

        $res = $n->updateMember(organizationId: 'organizationId', userId: 'userId');
        $this->assertNotNull($res);
        $this->assertEquals('PATCH', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId/members/userId', $tr->request->path);
    }

    public function testRemoveMember(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
{}
EOD;

        $n = new Organizations($tr);

        $res = $n->removeMember(organizationId: 'organizationId', userId: 'userId');
        $this->assertNotNull($res);
        $this->assertEquals('DELETE', $tr->request->method);
        $this->assertEquals('/admin/v1/organizations/organizationId/members/userId', $tr->request->path);
    }
}
