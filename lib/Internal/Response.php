<?php

namespace UserHub\Internal;

class Response
{
    public Request $req;
    public string $body;

    public function __construct(Request $req, string $body)
    {
        $this->req = $req;
        $this->body = $body;
    }

    public function decodeBody(callable $callback): mixed
    {
        try {
            $body = json_decode($this->body, flags: JSON_THROW_ON_ERROR);
        } catch (Exception $e) {
            throw new UserHubError(
                message: 'Failed to decode response'.$this->summarizeBody($this->body),
                call: $this->req->call,
                statusCode: 200,
                previous: $e,
            );
        }

        return \call_user_func($callback, $body);
    }

    public static function summarizeBody(?string $body): string
    {
        if (empty($body)) {
            return '';
        }
        $body = trim(preg_replace('/\s+/', ' ', $body));
        if (empty($body)) {
            return '';
        }
        $body = substr($body, 0, Constants::SUMMARIZE_BODY_LENGTH * 2);

        return ': '.$body.'...';
    }
}
