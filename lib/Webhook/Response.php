<?php

declare(strict_types=1);

namespace UserHub\Webhook;

use UserHub\Internal\Headers;

class Response
{
    public int $statusCode;
    public Headers $headers;
    public string $body;

    /**
     * @param null|array<string, string>|object $headers
     */
    public function __construct(
        null|int $statusCode = null,
        null|array|object $headers = null,
        null|string $body = null,
    ) {
        $this->statusCode = $statusCode ?? 200;
        if (\is_object($headers)) {
            $headers = (array) $headers;
        }
        $this->headers = new Headers($headers ?? []);
        $this->body = $body ?? '';
    }
}
