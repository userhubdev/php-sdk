<?php

declare(strict_types=1);

namespace UserHub\Internal;

use UserHub\UserHubError;

/**
 * @internal
 */
final class Response
{
    public Request $req;
    public string $body;

    public function __construct(Request $req, string $body)
    {
        $this->req = $req;
        $this->body = $body;
    }

    /**
     * @throws UserHubError if JSON fails to decode
     */
    public function decodeBody(): mixed
    {
        try {
            return json_decode($this->body, flags: JSON_THROW_ON_ERROR);
        } catch (\Exception $e) {
            throw new UserHubError(
                message: 'Failed to decode response'.Util::summarizeBody($this->body),
                call: $this->req->call,
                statusCode: 200,
                previous: $e,
            );
        }
    }
}
