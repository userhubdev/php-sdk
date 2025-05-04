<?php

declare(strict_types=1);

namespace UserHub;

use donatj\MockWebServer\MockWebServer;
use donatj\MockWebServer\Response;
use PHPUnit\Framework\TestCase;
use UserHub\AdminV1\AccountConnection;
use UserHub\AdminV1\User;
use UserHub\Internal\Constants;

/**
 * @internal
 *
 * @coversNothing
 */
final class BasicsTest extends TestCase
{
    protected static MockWebServer $server;
    protected static AdminApi $adminApi;

    public static function setUpBeforeClass(): void
    {
        self::$server = new MockWebServer();
        self::$server->start();

        self::$adminApi = new AdminApi('userhub_admin_test', baseUrl: self::$server->getServerRoot());
    }

    public static function tearDownAfterClass(): void
    {
        self::$server->stop();
    }

    public function getEnv(string $name): string
    {
        $value = getenv($name);
        if (empty($value)) {
            self::markTestSkipped("{$name} not configured");
        }

        return "{$value}";
    }

    public function testAdminApi(): void
    {
        $adminApi = new AdminApi(self::getEnv('TEST_USERHUB_ADMIN_KEY'));
        $res = $adminApi->users->list();
        self::assertGreaterThanOrEqual(0, \count($res->users));
    }

    public function testUserApi(): void
    {
        $userApi = new UserApi(self::getEnv('TEST_USERHUB_USER_KEY'));
        $session = $userApi->session->get();
        self::assertNull($session->user);
    }

    public function testModel(): void
    {
        $user = new User(
            id: 'usr_1',
            displayName: 'Jane Doe',
            accountConnections: [
                new AccountConnection(externalId: 'cus_1'),
            ],
            createTime: new \DateTime(timezone: new \DateTimeZone('UTC')),
        );
        self::assertSame('Jane Doe', $user->displayName);

        $data = $user->jsonSerialize();
        self::assertInstanceOf(\stdClass::class, $data);
        self::assertObjectHasProperty('displayName', $data);
        self::assertSame('Jane Doe', $data->displayName);

        $encodedJson = json_encode($data) ?: '';
        $decodedUser = User::jsonUnserialize(json_decode($encodedJson));
        self::assertEquals($user, $decodedUser);
    }

    public function testApiGet(): void
    {
        self::$server->setResponseOfPath(
            '/admin/v1/users/usr_1',
            new Response(
                body: '{"id": "usr_1", "displayName": "Jane Doe"}',
                headers: ['content-type' => 'application/json'],
            ),
        );

        $res = self::$adminApi->users->get('usr_1');
        self::assertEquals('usr_1', $res->id);
        self::assertEquals('Jane Doe', $res->displayName);

        $req = self::$server->getLastRequest();
        self::assertNotNull($req);
        self::assertEquals('GET', $req->getRequestMethod());
        self::assertEquals(Constants::API_VERSION, $req->getHeaders()['userhub-api-version']);
        self::assertEquals('Bearer userhub_admin_test', $req->getHeaders()['authorization']);
    }

    public function testApiPost(): void
    {
        self::$server->setResponseOfPath(
            '/admin/v1/users',
            new Response(
                body: '{"id": "usr_1", "displayName": "Jane Doe"}',
                headers: ['content-type' => 'application/json'],
            ),
        );

        $res = self::$adminApi->users->create(displayName: 'Jane Doe');
        self::assertEquals('usr_1', $res->id);
        self::assertEquals('Jane Doe', $res->displayName);

        $req = self::$server->getLastRequest();
        self::assertNotNull($req);
        self::assertEquals('POST', $req->getRequestMethod());
        self::assertEquals(Constants::API_VERSION, $req->getHeaders()['userhub-api-version']);
        self::assertEquals('Bearer userhub_admin_test', $req->getHeaders()['authorization']);
        self::assertEquals('{"displayName":"Jane Doe"}', $req->getInput());

        self::$server->setResponseOfPath(
            '/admin/v1/users',
            new Response(
                body: '{"id": "usr_1"}',
                headers: ['content-type' => 'application/json'],
            ),
        );

        $res = self::$adminApi->users->create(displayName: '');
        self::assertEquals('usr_1', $res->id);
        self::assertEmpty($res->displayName);

        $req = self::$server->getLastRequest();
        self::assertNotNull($req);
        self::assertEquals('{}', $req->getInput());
    }

    public function testApiPatch(): void
    {
        self::$server->setResponseOfPath(
            '/admin/v1/users/usr_1',
            new Response(
                body: '{"id": "usr_1", "displayName": "Jane Doe"}',
                headers: ['content-type' => 'application/json'],
            ),
        );

        $res = self::$adminApi->users->update('usr_1', displayName: 'Jane Doe');
        self::assertEquals('usr_1', $res->id);
        self::assertEquals('Jane Doe', $res->displayName);

        $req = self::$server->getLastRequest();
        self::assertNotNull($req);
        self::assertEquals('PATCH', $req->getRequestMethod());
        self::assertEquals(Constants::API_VERSION, $req->getHeaders()['userhub-api-version']);
        self::assertEquals('Bearer userhub_admin_test', $req->getHeaders()['authorization']);
        self::assertEquals('{"displayName":"Jane Doe"}', $req->getInput());

        self::$server->setResponseOfPath(
            '/admin/v1/users/usr_1',
            new Response(
                body: '{"id": "usr_1"}',
                headers: ['content-type' => 'application/json'],
            ),
        );

        $res = self::$adminApi->users->update('usr_1', displayName: '');
        self::assertEquals('usr_1', $res->id);
        self::assertEmpty($res->displayName);

        $req = self::$server->getLastRequest();
        self::assertNotNull($req);
        self::assertEquals('{"displayName":""}', $req->getInput());
    }

    public function testApiDelete(): void
    {
        self::$server->setResponseOfPath(
            '/admin/v1/users/usr_1',
            new Response(
                body: '{"id": "usr_1", "displayName": "Jane Doe"}',
                headers: ['content-type' => 'application/json'],
            ),
        );

        $res = self::$adminApi->users->delete('usr_1');
        self::assertEquals('usr_1', $res->id);
        self::assertEquals('Jane Doe', $res->displayName);

        $req = self::$server->getLastRequest();
        self::assertNotNull($req);
        self::assertEquals('DELETE', $req->getRequestMethod());
        self::assertEquals(Constants::API_VERSION, $req->getHeaders()['userhub-api-version']);
        self::assertEquals('Bearer userhub_admin_test', $req->getHeaders()['authorization']);
    }

    public function testApiError(): void
    {
        self::$server->setResponseOfPath(
            '/admin/v1/users/usr_1',
            new Response(
                body: '{"code":"NOT_FOUND", "message":"Not Found", "metadata":{}}',
                headers: ['content-type' => 'application/json'],
                status: 404,
            ),
        );

        $this->expectException(UserHubError::class);

        try {
            self::$adminApi->users->get('usr_1');
        } catch (UserHubError $ex) {
            self::assertEquals('UserHubError: Not Found (call: admin.users.get, apiCode: NOT_FOUND)', "{$ex}");
            self::assertEquals(Code::NotFound, $ex->getApiCode());
            self::assertEquals('Not Found', $ex->getMessage());
            self::assertEquals(404, $ex->getStatusCode());

            throw $ex;
        }
    }

    public function testApiRateLimited(): void
    {
        if (empty(getenv('CI'))) {
            self::markTestSkipped('Skipping slow test');
        }

        self::$server->setResponseOfPath(
            '/admin/v1/users/usr_1',
            new Response(
                body: '',
                headers: ['content-type' => 'application/json'],
                status: 429,
            ),
        );

        $this->expectException(UserHubError::class);

        $startTime = time();

        try {
            self::$adminApi->users->get('usr_1');
        } catch (UserHubError $ex) {
            $endTime = time();

            self::assertEquals('UserHubError: API call rate limited '.
                '(call: admin.users.get, apiCode: RESOURCE_EXHAUSTED)', "{$ex}");
            self::assertEquals(Code::ResourceExhausted, $ex->getApiCode());
            self::assertEquals('API call rate limited', $ex->getMessage());
            self::assertEquals(429, $ex->getStatusCode());

            $diff = $endTime - $startTime;

            self::assertGreaterThanOrEqual(2, $diff);
            self::assertLessThanOrEqual(4, $diff);

            throw $ex;
        }
    }
}
