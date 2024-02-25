<?php

declare(strict_types=1);

namespace UserHub\Webhook;

use UserHub\Internal\Constants;
use UserHub\UserHubError;

/**
 * @internal
 */
abstract class Util
{
    public static function createResponse(mixed $value): WebhookResponse
    {
        $statusCode = 200;

        if (!isset($value)) {
            $body = '{}';
        } elseif (\is_string($value)) {
            $body = $value;
        } elseif ($value instanceof WebhookResponse) {
            return $value;
        } elseif ($value instanceof \Exception) {
            if ($value instanceof UserHubError) {
                try {
                    $statusCode = $value->getApiCode()->webhookStatusCode();
                    $body = json_encode($value, JSON_THROW_ON_ERROR);
                } catch (\Exception $ex) {
                    $statusCode = 500;
                    $body = Constants::WEBHOOK_SERVER_ERROR_JSON;
                }
            } else {
                $statusCode = 500;
                $body = Constants::WEBHOOK_SERVER_ERROR_JSON;
            }
        } else {
            try {
                $body = json_encode($value, JSON_THROW_ON_ERROR);
            } catch (\Exception $ex) {
                $statusCode = 500;
                $body = Constants::WEBHOOK_SERVER_ERROR_JSON;
            }
        }

        return new WebhookResponse(
            statusCode: $statusCode,
            headers: [
                'Content-Type' => 'application/json',
                'Webhook-Agent' => Constants::USER_AGENT,
            ],
            body: empty($body) ? '{}' : $body,
        );
    }
}
