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
class InvoicesTest extends TestCase
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
      "paymentState": "ACTION_REQUIRED",
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
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/user/v1/invoices', $tr->request->path);
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
      "proration": true
    }
  ],
  "createTime": "2024-02-05T23:07:46.483Z",
  "updateTime": "2024-02-05T23:07:46.483Z"
}
EOD;

        $n = new Invoices($tr);

        $res = $n->get(invoiceId: 'invoiceId');
        $this->assertNotNull($res);
        $this->assertEquals('GET', $tr->request->method);
        $this->assertEquals('/user/v1/invoices/invoiceId', $tr->request->path);
    }
}
