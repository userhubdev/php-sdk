<?php

declare(strict_types=1);

// Code generated. DO NOT EDIT.

namespace UserHub\Internal;

abstract class Constants
{
    public const API_BASE_URL = 'https://api.userhub.com';
    public const VERSION = '0.2.0';

    public const AUTH_HEADER = 'Authorization';
    public const API_KEY_HEADER = 'UserHub-Api-Key';
    public const ADMIN_KEY_PREFIX = 'sk_';
    public const USER_KEY_PREFIX = 'pk_';

    public const SUMMARIZE_BODY_LENGTH = 20;

    public const CONNECT_TIMEOUT_MS = 30000;
    public const CONNECTION_IDLE_TIMEOUT_MS = 30000;
    public const MAX_BODY_SIZE_BYTES = 5242880;
    public const MAX_CONNECTIONS = 100;
    public const MAX_IDLE_CONNECTIONS = 5;
    public const READ_TIMEOUT_MS = 30000;
    public const REQUEST_TIMEOUT_MS = 60000;
    public const RETRY_MAX_ATTEMPTS = 5;
    public const RETRY_MAX_SLEEP_MS = 20000;
    public const RETRY_MULTIPLIER_MS = 100;
    public const RETRY_OVERHEAD_MS = 100;
    public const TLS_TIMEOUT_MS = 10000;
    public const WRITE_TIMEOUT_MS = 30000;
}
