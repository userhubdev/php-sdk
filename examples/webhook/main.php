<?php

declare(strict_types=1);

require __DIR__.'/../../vendor/autoload.php';

use UserHub\EventsV1\Event;
use UserHub\Webhook;

if (PHP_SAPI === 'cli') {
    $port = getenv('PORT') ?: '8000';
    echo "php -S localhost:{$port} ".__FILE__.PHP_EOL;

    exit(1);
}

$signingSecret = getenv('SIGNING_SECRET');
if (empty($signingSecret)) {
    echo 'SIGNING_SECRET required'.PHP_EOL;

    exit(1);
}

$webhook = new Webhook($signingSecret);

$webhook->onEvent(static function (Event $event): void {
    error_log('Event: '.$event->type);

    switch ($event->type) {
        case 'organizations.changed':
            $organization = $event->organizationsChanged->organization;
            error_log(" - Organization: {$organization->id} {$organization->displayName}");

            break;

        case 'users.changed':
            $user = $event->usersChanged->user;
            error_log(" - User: {$user->id} {$user->displayName}");

            break;
    }
});

$webhook->handleFromGlobals();
