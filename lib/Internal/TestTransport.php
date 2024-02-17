<?php

declare(strict_types=1);

namespace UserHub\Internal;

use UserHub\UserHubError;

class TestTransport implements Transport
{
    public ?UserHubError $error;
    public ?Request $request;
    public string $body;

    public function __construct()
    {
        $this->error = null;
        $this->request = null;
        $this->body = '{}';
    }

    public function execute(Request $req): Response
    {
        $this->request = $req;

        if (isset($this->error)) {
            throw $this->error;
        }

        return new Response($req, $this->body);
    }
}
