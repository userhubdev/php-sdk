<?php

declare(strict_types=1);

namespace UserHub\Webhook;

use UserHub\Code;
use UserHub\UserHubError;

/**
 * WebhookUserNotFound is an error which can be used to indicate a user was
 * not found in the onGetUser, onUpdateUser, and onDeleteUser methods.
 */
class WebhookUserNotFound extends UserHubError
{
    public function __construct()
    {
        parent::__construct(message: 'User not found', apiCode: Code::NotFound);
    }
}
