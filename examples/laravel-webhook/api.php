<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use UserHub\EventsV1\Event;
use UserHub\Webhook;

Route::post('/webhook', static function (Request $request) {
    $webhook = new Webhook(config('app.signing_secret'));

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

    $res = $webhook($request->header(), $request->getContent());

    return new Response($res->body, $res->statusCode, $res->headers->array());
});
