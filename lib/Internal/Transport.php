<?php

declare(strict_types=1);

namespace UserHub\Internal;

use UserHub\UserHubError;

/**
 * @internal
 */
interface Transport
{
    /**
     * @throws UserHubError if there was an error executing the API request
     */
    public function execute(Request $req): Response;
}
