<?php

declare(strict_types=1);

namespace UserHub\Webhook;

use UserHub\Internal\Headers;

class WebhookResponse
{
    public int $statusCode;
    public Headers $headers;
    public string $body;

    /**
     * @param null|array<string, string>|object $headers
     */
    public function __construct(
        ?int $statusCode = null,
        null|array|object $headers = null,
        ?string $body = null,
    ) {
        $this->statusCode = $statusCode ?? 200;
        if (\is_object($headers)) {
            $headers = (array) $headers;
        }
        $this->headers = new Headers($headers ?? []);
        $this->body = $body ?? '';
    }
}
