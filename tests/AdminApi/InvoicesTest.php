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
final class InvoicesTest extends TestCase
{
    public function testList(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "invoices": [
                {
                  "id": "string",
                  "state": "DRAFT",
                  "stateReason": "DELETED",
                  "stateTime": "2024-02-05T23:07:46.483Z",
                  "externalId": "string",
                  "number": "string",
                  "currencyCode": "USD",
                  "description": "string",
                  "effectiveTime": "2024-02-05T23:07:46.483Z",
                  "subtotalAmount": "string",
                  "discountAmount": "string",
                  "taxAmount": "string",
                  "totalAmount": "string",
                  "dueAmount": "string",
                  "remainingDueAmount": "string",
                  "dueTime": "2024-02-05T23:07:46.483Z",
                  "paidAmount": "string",
                  "paymentState": "ACTION_REQUIRED",
                  "pullTime": "2024-02-05T23:07:46.483Z",
                  "createTime": "2024-02-05T23:07:46.483Z",
                  "updateTime": "2024-02-05T23:07:46.483Z"
                }
              ],
              "nextPageToken": "string",
              "previousPageToken": "string"
            }
            EOD;

        $n = new Invoices($tr);

        $res = $n->list();
        self::assertNotNull($res);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/admin/v1/invoices', $tr->request->path);
    }

    public function testGet(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "state": "DRAFT",
              "stateReason": "DELETED",
              "stateTime": "2024-02-05T23:07:46.483Z",
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
              "number": "string",
              "currencyCode": "USD",
              "description": "string",
              "account": {
                "fullName": "Test",
                "email": "test@example.com",
                "phoneNumber": "+12125550123",
                "address": {
                  "lines": [],
                  "city": "Brooklyn",
                  "state": "string",
                  "postalCode": "11222",
                  "country": "US"
                }
              },
              "effectiveTime": "2024-02-05T23:07:46.483Z",
              "period": {
                "startTime": "2024-02-05T23:07:46.483Z",
                "endTime": "2024-02-05T23:07:46.483Z"
              },
              "subtotalAmount": "string",
              "discountAmount": "string",
              "balance": {
                "startAmount": "string",
                "endAmount": "string",
                "appliedAmount": "string"
              },
              "taxAmount": "string",
              "totalAmount": "string",
              "dueAmount": "string",
              "remainingDueAmount": "string",
              "dueTime": "2024-02-05T23:07:46.483Z",
              "paidAmount": "string",
              "paymentState": "ACTION_REQUIRED",
              "paymentIntent": {
                "stripe": {
                  "accountId": "string",
                  "live": true,
                  "clientSecret": "string"
                }
              },
              "items": [
                {
                  "id": "string",
                  "quantity": 1,
                  "subtotalAmount": "string",
                  "discountAmount": "string",
                  "description": "string",
                  "externalId": "string",
                  "proration": true
                }
              ],
              "changes": [
                {
                  "time": "2024-02-05T23:07:46.483Z",
                  "description": "string",
                  "subtotalAmount": "string",
                  "discountAmount": "string",
                  "startQuantity": 1,
                  "endQuantity": 1,
                  "startItemIds": [],
                  "endItemIds": []
                }
              ],
              "pullTime": "2024-02-05T23:07:46.483Z",
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Invoices($tr);

        $res = $n->get(invoiceId: 'invoiceId');
        self::assertNotNull($res);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/admin/v1/invoices/invoiceId', $tr->request->path);
    }
}
