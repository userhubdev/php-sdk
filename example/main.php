<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use UserHub\AdminApi;
use UserHub\UserApi;
use UserHub\UserHubError;

$adminKey = getenv('ADMIN_KEY');
if (empty($adminKey)) {
    echo 'ADMIN_KEY required'.PHP_EOL;

    exit(1);
}

$userKey = getenv('USER_KEY');
if (empty($adminKey)) {
    echo 'USER_KEY required'.PHP_EOL;

    exit(1);
}

$adminApi = new AdminApi($adminKey);

$res = $adminApi->users->list(pageSize: 5);

foreach ($res->users as $user) {
    if ($user->disabled) {
        continue;
    }

    $apiSession = $adminApi->users->createApiSession($user->id);

    $userApi = new UserApi($userKey, $apiSession->accessToken);

    $session = $userApi->session->get();

    echo 'User:'.PHP_EOL;
    echo ' - ID: '.$session->user->id.PHP_EOL;
    echo ' - Name: '.$session->user->displayName.PHP_EOL;
    echo ' - Memberships: '.count($session->memberships).PHP_EOL;

    break;
}

try {
    $adminApi->users->get('test');
} catch (UserHubError $e) {
    echo PHP_EOL;
    echo $e.PHP_EOL;
    echo PHP_EOL;
    echo 'UserHub error:'.PHP_EOL;
    echo ' - ApiCode: '.$e->getApiCode().PHP_EOL;
    echo ' - Message: '.$e->getMessage().PHP_EOL;
    echo ' - Reason: '.$e->getReason().PHP_EOL;
    echo ' - Param: '.$e->getParam().PHP_EOL;
    echo ' - Call: '.$e->getCall().PHP_EOL;
}
