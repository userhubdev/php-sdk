<?php

declare(strict_types=1);

// Code generated. DO NOT EDIT.

namespace UserHub\Internal;

abstract class Constants
{
    public const API_BASE_URL = 'https://api.userhub.com';
    public const USER_AGENT = 'UserHub-PHP/0.6.0';
    public const VERSION = '0.6.0';

    public const AUTH_HEADER = 'Authorization';
    public const API_KEY_HEADER = 'UserHub-Api-Key';
    public const ADMIN_KEY_PREFIX = 'sk_';
    public const USER_KEY_PREFIX = 'pk_';

    public const SUMMARIZE_BODY_LENGTH = 20;

    public const WEBHOOK_ACTION_HEADER = 'UserHub-Action';
    public const WEBHOOK_AGENT_HEADER = 'Webhook-Agent';
    public const WEBHOOK_MAX_REQUEST_SIZE_BYTES = 5242880;
    public const WEBHOOK_MAX_TIMESTAMP_DIFF_MS = 300000;
    public const WEBHOOK_SIGNATURE_HEADER = 'UserHub-Signature';
    public const WEBHOOK_TIMESTAMP_HEADER = 'UserHub-Timestamp';
    public const WEBHOOK_SERVER_ERROR_JSON = '{"message":"Webhook server error","code":"INTERNAL"}';

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
