<?php

namespace UserHub;

use UserHub\Internal\Constants;

class AdminApi extends AdminApi\Client
{
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
        if (!str_starts_with($adminKey, Constants::ADMIN_KEY_PREFIX)) {
            throw new UserHubError('adminKey must start with `'.Constants::ADMIN_KEY_PREFIX.'`');
        }
        $headers[Constants::AUTH_HEADER] = "Bearer {$adminKey}";

        $transport = new Internal\HttpTransport($baseUrl, $headers);

        parent::__construct($transport);
    }
}
