<?php

declare(strict_types=1);

namespace UserHub;

use UserHub\Internal\Constants;

class UserApi extends UserApi\Client
{
    /**
     * @throws UserHubError if arguments are invalid
     */
    public function __construct(
        string $userKey,
        ?string $accessToken = null,
        ?string $apiVersion = null,
        ?string $baseUrl = null,
    ) {
        if (empty($apiVersion)) {
            $apiVersion = Constants::API_VERSION;
        }
        if (empty($baseUrl)) {
            $baseUrl = Constants::API_BASE_URL;
        }

        $headers = [];

        $headers[Constants::API_VERSION_HEADER] = $apiVersion;

        $userKey = empty($userKey) ? '' : trim($userKey);

        if (empty($userKey)) {
            throw new UserHubError('userKey required');
        }
        $headers[Constants::API_KEY_HEADER] = $userKey;

        $accessToken = empty($accessToken) ? '' : trim($accessToken);
        if (!empty($accessToken)) {
            $headers[Constants::AUTH_HEADER] = "Bearer {$accessToken}";
        }

        $transport = new Internal\HttpTransport($baseUrl, $headers);

        parent::__construct($transport);
    }
}
