<?php

declare(strict_types=1);

namespace UserHub\Webhook;

use UserHub\Internal\Constants;
use UserHub\Internal\Headers;
use UserHub\UserHubError;

class Request
{
    public Headers $headers;
    public string $body;

    /**
     * @param null|array<string, string>|object $headers
     */
    public function __construct(
        null|array|object $headers = null,
        null|string $body = null,
    ) {
        if (\is_object($headers)) {
            $headers = (array) $headers;
        }
        $this->headers = new Headers($headers ?? []);
        $this->body = $body ?? '';
    }

    /**
     * @throws UserHubError
     */
    public function getAction(): string
    {
        $name = $this->headers->get(Constants::WEBHOOK_ACTION_HEADER);

        if (empty($name)) {
            throw new UserHubError(Constants::WEBHOOK_ACTION_HEADER.' header is missing');
        }

        return $name;
    }

    /**
     * @throws UserHubError
     */
    public function getTimestamp(): string
    {
        $timestamp = $this->headers->get(Constants::WEBHOOK_TIMESTAMP_HEADER);

        if (empty($timestamp)) {
            throw new UserHubError(Constants::WEBHOOK_TIMESTAMP_HEADER.' header is missing');
        }

        return $timestamp;
    }

    /**
     * @return string[]
     *
     * @throws UserHubError
     */
    public function getSignatures(): array
    {
        $signatures = [];

        $headers = $this->headers->getAll(Constants::WEBHOOK_SIGNATURE_HEADER);

        if (empty($headers)) {
            throw new UserHubError(Constants::WEBHOOK_SIGNATURE_HEADER.' header is missing');
        }

        foreach ($headers as $header) {
            $header = trim($header);
            if (empty($header)) {
                continue;
            }

            if (!str_contains($header, ',')) {
                $signatures[] = $header;

                continue;
            }

            $headerParts = explode(',', $header);

            foreach ($headerParts as $signature) {
                $signature = trim($signature);

                if (!empty($signature)) {
                    $signatures[] = $signature;
                }
            }
        }

        if (empty($signatures)) {
            throw new UserHubError(Constants::WEBHOOK_SIGNATURE_HEADER.' header normalized to nothing');
        }

        return $signatures;
    }
}
