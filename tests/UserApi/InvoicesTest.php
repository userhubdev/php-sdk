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
                  "state": "OPEN",
                  "stateTime": "2024-02-05T23:07:46.483Z",
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
                  "paymentState": "PAYMENT_METHOD_REQUIRED",
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
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/user/v1/invoices', $tr->request->path);
    }

    public function testGet(): void
    {
        $tr = new TestTransport();
        $tr->body = <<<'EOD'
            {
              "id": "string",
              "state": "OPEN",
              "stateTime": "2024-02-05T23:07:46.483Z",
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
              "paymentState": "PAYMENT_METHOD_REQUIRED",
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
              "createTime": "2024-02-05T23:07:46.483Z",
              "updateTime": "2024-02-05T23:07:46.483Z"
            }
            EOD;

        $n = new Invoices($tr);

        $res = $n->get(invoiceId: 'invoiceId');
        self::assertNotNull($res);
        self::assertNotNull($tr->request);
        self::assertEquals('GET', $tr->request->method);
        self::assertEquals('/user/v1/invoices/invoiceId', $tr->request->path);
    }
}
