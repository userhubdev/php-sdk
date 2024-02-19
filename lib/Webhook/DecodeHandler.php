<?php

declare(strict_types=1);

namespace UserHub\Webhook;

use UserHub\UserHubError;

/**
 * @internal
 */
final class DecodeHandler
{
    private \Closure $handler;
    private \Closure $decoder;

    public function __construct(callable $handler, callable $decoder)
    {
        $this->handler = $handler(...);
        $this->decoder = $decoder(...);
    }

    /**
     * @throws UserHubError
     */
    public function __invoke(Request $req): Response
    {
        try {
            $data = \call_user_func($this->decoder, json_decode($req->body, flags: JSON_THROW_ON_ERROR));
        } catch (\Exception $e) {
            throw new UserHubError(
                message: 'Failed to decode request'.Util::summarizeBody($body),
                previous: $e,
            );
        }

        $data = \call_user_func($this->handler, $data);

        return Util::createResponse($data);
    }
}
