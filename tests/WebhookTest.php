<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use UserHub\Code;
use UserHub\ConnectionsV1\CustomUser;
use UserHub\ConnectionsV1\GetCustomUserRequest;
use UserHub\ConnectionsV1\ListCustomUsersRequest;
use UserHub\ConnectionsV1\ListCustomUsersResponse;
use UserHub\EventsV1\Event;
use UserHub\Internal\Constants;
use UserHub\UserHubError;
use UserHub\Webhook;
use UserHub\Webhook\WebhookRequest;
use UserHub\Webhook\WebhookResponse;
use UserHub\Webhook\WebhookUserNotFound;

/**
 * @internal
 *
 * @coversNothing
 */
final class WebhookTest extends TestCase
{
    /**
     * @dataProvider provideHandleCases
     */
    public function testHandle(
        string $name,
        string $secret,
        WebhookRequest $request,
        WebhookResponse $response,
        bool $setTimestamp,
        bool $setSignature,
        bool $addSignature,
    ): void {
        $onError = static function (Exception $ex): void {};

        $webhook = new Webhook($secret, onError: $onError);

        $webhook->onEvent(static function (Event $input): void {
            if ('ok' !== $input->type) {
                throw new UserHubError("Event failed: {$input->type}", apiCode: Code::InvalidArgument);
            }
        });

        $webhook->onListUsers(static function (ListCustomUsersRequest $input): ListCustomUsersResponse {
            if (100 !== $input->pageSize) {
                throw new Error("unexpected page size {$input->pageSize}");
            }

            return new ListCustomUsersResponse(users: [], nextPageToken: '');
        });

        $webhook->onGetUser(static function (GetCustomUserRequest $input): CustomUser {
            if ('not-found' === $input->id) {
                throw new WebhookUserNotFound();
            }

            return new CustomUser(id: $input->id);
        });

        if ($setTimestamp) {
            $request->headers['UserHub-Timestamp'] = (string) time();
        }
        if ($setSignature || $addSignature) {
            $timestamp = $request->headers->get('UserHub-Timestamp');

            $signature = hash_hmac('sha256', $timestamp.'.'.$request->body, $secret);

            if ($setSignature) {
                $header = $request->headers->get('UserHub-Signature');

                if (!str_contains($header, '{signature}')) {
                    $header = str_replace('{signature}', $signature, $header);
                } else {
                    $header = $signature;
                }

                $request->headers['UserHub-Signature'] = $header;
            } else {
                $header = $request->headers['UserHub-Signature'];

                if (is_array($header)) {
                    $header[] = $signature;
                } elseif (is_string($header)) {
                    $header = [$header, $signature];
                } else {
                    $header = $signature;
                }

                $request->headers['UserHub-Signature'] = $header;
            }
        }

        $res = $webhook->handleAction($request);

        self::assertEquals($response->statusCode, $res->statusCode, $res->body ?: '{}');

        self::assertEquals($res->headers['content-type'], 'application/json');
        self::assertEquals($res->headers[Constants::WEBHOOK_AGENT_HEADER], Constants::USER_AGENT);

        $expected = json_decode($response->body ?: '{}', flags: JSON_THROW_ON_ERROR);
        $actual = json_decode($res->body ?: '{}', flags: JSON_THROW_ON_ERROR);

        self::assertEquals($expected, $actual);
    }

    /**
     * @return iterable<mixed>
     */
    public static function provideHandleCases(): iterable
    {
        return [
            [
                'Signing secret is required',
                '',
                new WebhookRequest(
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"Signing secret is required","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'Headers are required',
                'test',
                new WebhookRequest(
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"Headers are required","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'Body is required',
                'test',
                new WebhookRequest(
                    headers: [
                        'content-type' => 'application/json',
                    ],
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"Body is required","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'UserHub-Action header is missing',
                'test',
                new WebhookRequest(
                    headers: [
                        'content-type' => 'application/json',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"UserHub-Action header is missing","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'UserHub-Timestamp header is missing',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"UserHub-Timestamp header is missing","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'UserHub-Signature header is missing',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"UserHub-Signature header is missing","code":"UNKNOWN"}',
                ),
                true,
                false,
                false,
            ],
            [
                'Signatures normalized to nothing',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                        'UserHub-Signature' => ',',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"UserHub-Signature header normalized to nothing","code":"UNKNOWN"}',
                ),
                true,
                false,
                false,
            ],
            [
                'Timestamp is invalid',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                        'UserHub-Timestamp' => 'timestamp',
                        'UserHub-Signature' => 'fail',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"Timestamp is invalid: timestamp","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'Timestamp is too far in the past',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                        'UserHub-Timestamp' => '1',
                        'UserHub-Signature' => 'fail',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"Timestamp is too far in the past: 1","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'Timestamp is too far in the past',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                        'UserHub-Timestamp' => '5000000000',
                        'UserHub-Signature' => 'fail',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"Timestamp is too far in the future: 5000000000","code":"UNKNOWN"}',
                ),
                false,
                false,
                false,
            ],
            [
                'Signatures do not match',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                        'UserHub-Signature' => 'fail',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 500,
                    body: '{"message":"Signatures do not match","code":"UNKNOWN"}',
                ),
                true,
                false,
                false,
            ],
            [
                'Challenge',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'challenge',
                    ],
                    body: '{"challenge": "some-value"}',
                ),
                new WebhookResponse(
                    statusCode: 200,
                    body: '{"challenge": "some-value"}',
                ),
                true,
                false,
                true,
            ],
            [
                'Handle multiple signature headers',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'challenge',
                        'UserHub-Signature' => 'fail',
                    ],
                    body: '{"challenge": "some-value"}',
                ),
                new WebhookResponse(
                    statusCode: 200,
                    body: '{"challenge": "some-value"}',
                ),
                true,
                false,
                true,
            ],
            [
                'Handle combined signature headers',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'challenge',
                        'UserHub-Signature' => 'fail, {signature}',
                    ],
                    body: '{"challenge": "some-value"}',
                ),
                new WebhookResponse(
                    statusCode: 200,
                    body: '{"challenge": "some-value"}',
                ),
                true,
                true,
                false,
            ],
            [
                'Handler not implemented',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'unknown',
                    ],
                    body: '{}',
                ),
                new WebhookResponse(
                    statusCode: 501,
                    body: '{"message":"Handler not implemented: unknown","code":"UNIMPLEMENTED"}',
                ),
                true,
                false,
                true,
            ],
            [
                'Event handler succeeds',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                    ],
                    body: '{"type": "ok"}',
                ),
                new WebhookResponse(
                    statusCode: 200,
                    body: '{}',
                ),
                true,
                false,
                true,
            ],
            [
                'Event handler errors',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'events.handle',
                    ],
                    body: '{"type": "fail"}',
                ),
                new WebhookResponse(
                    statusCode: 400,
                    body: '{"message":"Event failed: fail","code":"INVALID_ARGUMENT"}',
                ),
                true,
                false,
                true,
            ],
            [
                'List users',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'users.list',
                    ],
                    body: '{"pageSize":100}',
                ),
                new WebhookResponse(
                    statusCode: 200,
                    body: '{"nextPageToken":"","users":[]}',
                ),
                true,
                false,
                true,
            ],
            [
                'Get user',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'users.get',
                    ],
                    body: '{"id": "1"}',
                ),
                new WebhookResponse(
                    statusCode: 200,
                    body: '{"id":"1","displayName":"","email":"","emailVerified":false,"phoneNumber":"","phoneNumberVerified":false,"imageUrl":"","disabled":false}',
                ),
                true,
                false,
                true,
            ],
            [
                'Get user not found',
                'test',
                new WebhookRequest(
                    headers: [
                        'UserHub-Action' => 'users.get',
                    ],
                    body: '{"id": "not-found"}',
                ),
                new WebhookResponse(
                    statusCode: 404,
                    body: '{"message":"User not found","code":"NOT_FOUND"}',
                ),
                true,
                false,
                true,
            ],
        ];
    }
}
