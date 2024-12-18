<?php

declare(strict_types=1);

namespace UserHub;

class UserApi extends UserApi\Client
{
    /**
     * @throws UserHubError if arguments are invalid
     */
    public function __construct(
        string $userKey,
        ?string $accessToken = null,
        ?string $baseUrl = null,
    ) {
        if (empty($baseUrl)) {
            $baseUrl = Internal\Constants::API_BASE_URL;
        }

        $headers = [];

        $userKey = empty($userKey) ? '' : trim($userKey);

        if (empty($userKey)) {
            throw new UserHubError('userKey required');
        }
        $headers[Internal\Constants::API_KEY_HEADER] = $userKey;

        $accessToken = empty($accessToken) ? '' : trim($accessToken);
        if (!empty($accessToken)) {
            $headers[Internal\Constants::AUTH_HEADER] = "Bearer {$accessToken}";
        }

        $transport = new Internal\HttpTransport($baseUrl, $headers);

        parent::__construct($transport);
    }
}
