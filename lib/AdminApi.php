<?php

declare(strict_types=1);

namespace UserHub;

use UserHub\Internal\Constants;

class AdminApi extends AdminApi\Client
{
    /**
     * @throws UserHubError if arguments are invalid
     */
    public function __construct(
        string $adminKey,
        ?string $baseUrl = null,
    ) {
        if (empty($baseUrl)) {
            $baseUrl = Constants::API_BASE_URL;
        }

        $headers = [];

        $adminKey = empty($adminKey) ? '' : trim($adminKey);

        if (empty($adminKey)) {
            throw new UserHubError('adminKey required');
        }
        $headers[Constants::AUTH_HEADER] = "Bearer {$adminKey}";

        $transport = new Internal\HttpTransport($baseUrl, $headers);

        parent::__construct($transport);
    }
}
