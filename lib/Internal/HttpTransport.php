<?php

declare(strict_types=1);

namespace UserHub\Internal;

use UserHub\ApiV1\Status;
use UserHub\UserHubError;

class HttpTransport implements Transport
{
    private string $baseUrl;
    private CaseInsensitiveArray $headers;
    private ?\CurlHandle $_curlHandle;

    public function __construct(string $baseUrl, ?array $headers = null)
    {
        $this->baseUrl = $baseUrl;
        $this->headers = new CaseInsensitiveArray(!empty($headers) ? $headers : []);
        $this->headers['User-Agent'] = 'UserHub-Php/'.Constants::VERSION;
    }

    public function __destruct()
    {
        if (isset($this->_curlHandle)) {
            curl_close($this->_curlHandle);
            $this->_curlHandle = null;
        }
    }

    public function execute(Request $req): Response
    {
        $url = $this->baseUrl.$req->path;

        if (!empty($req->query)) {
            $query = [];

            foreach ($req->query as $key => $value) {
                $query[] = $key.'='.rawurlencode($value);
            }

            $url .= '?'.implode('&', $query);
        }

        $headers = new CaseInsensitiveArray();
        if (!empty($this->headers)) {
            foreach ($this->headers as $key => $value) {
                $headers[$key] = $value;
            }
        }
        if (!empty($req->headers)) {
            foreach ($req->headers as $key => $value) {
                $headers[$key] = $value;
            }
        }

        $body = null;
        if (isset($req->body)) {
            $headers['content-type'] = 'application/json';
            $body = json_encode($req->body);
        }

        while (true) {
            ++$req->attempt;

            try {
                return $this->attempt($req, $url, $headers, $body);
            } catch (\Exception $e) {
                $retry = $req->retry($e);
                if (!empty($retry)) {
                    usleep($retry * 1000);

                    continue;
                }

                throw $e;
            }
        }
    }

    private function curlHandle(): \CurlHandle
    {
        if (isset($this->_curlHandle)) {
            curl_reset($this->_curlHandle);
        } else {
            $this->_curlHandle = curl_init();
        }

        return $this->_curlHandle;
    }

    /**
     * @throws UserHubError
     */
    private function attempt(
        Request $req,
        string $url,
        CaseInsensitiveArray $headers,
        ?string $body,
    ): Response {
        $opts = [
            CURLOPT_CONNECTTIMEOUT_MS => Constants::CONNECT_TIMEOUT_MS,
            CURLOPT_TIMEOUT_MS => Constants::REQUEST_TIMEOUT_MS,
            CURLOPT_MAXCONNECTS => Constants::MAX_CONNECTIONS,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
        ];

        if (\defined('CURLOPT_MAXAGE_CONN')) {
            $opts[CURLOPT_MAXAGE_CONN] = (int) ceil(Constants::CONNECTION_IDLE_TIMEOUT_MS / 1000);
        }

        switch ($req->method) {
            case 'GET':
                $opts[CURLOPT_HTTPGET] = true;

                break;

            case 'POST':
                $opts[CURLOPT_POST] = true;

                break;

            case 'PATCH':
                $opts[CURLOPT_CUSTOMREQUEST] = 'PATCH';

                break;

            case 'DELETE':
                $opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';

                break;

            default:
                throw new \UnexpectedValueException("Method not supported: {$req->method}");
        }

        if (!empty($headers)) {
            $curlHeaders = [];

            foreach ($headers as $key => $value) {
                $curlHeaders[] = $key.': '.$value;
            }

            $opts[CURLOPT_HTTPHEADER] = $curlHeaders;
        }

        if (!empty($body)) {
            $opts[CURLOPT_POSTFIELDS] = $body;
        }

        $resHeaders = new CaseInsensitiveArray();

        $opts[CURLOPT_HEADERFUNCTION] = static function ($curl, $header) use (&$resHeaders) {
            $len = \strlen($header);

            $parts = explode(':', $header, 2);
            if (2 === \count($parts)) {
                $resHeaders[trim($parts[0])] = trim($parts[1]);
            }

            return $len;
        };

        $ch = $this->curlHandle();

        if (!curl_setopt_array($ch, $opts)) {
            throw new UserHubError('Failed to set cURL options', call: $req->call);
        }

        $resBody = curl_exec($ch);
        $errorNumber = curl_errno($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($errorNumber) {
            $errorMessage = curl_error($ch);

            $message = "cURL error ({$errorNumber})";
            if (!empty($errorMessage)) {
                $message .= ": {$errorMessage}";
            }

            throw new UserHubError(
                message: $message,
                call: $req->call,
                statusCode: $statusCode,
                previous: new CurlError(message: $errorMessage, code: $errorNumber),
            );
        }

        if (2 !== intdiv($statusCode, 100)) {
            $contentType = $resHeaders['content-type'] ?? '';
            if (str_contains($contentType, 'json') && !empty($resBody)) {
                try {
                    $statusData = json_decode($resBody, flags: JSON_THROW_ON_ERROR);
                } catch (\Exception $e) {
                    throw new UserHubError(
                        message: 'Failed to decode error response'.Response::summarizeBody($resBody),
                        call: $req->call,
                        statusCode: $statusCode,
                        previous: $e,
                    );
                }

                $status = Status::jsonUnserialize($statusData);

                throw new UserHubError(call: $req->call, status: $status, statusCode: $statusCode);
            }

            throw new UserHubError(
                message: 'API returned non-JSON error'.Response::summarizeBody($resBody),
                call: $req->call,
                statusCode: $statusCode,
            );
        }

        return new Response(req: $req, body: $resBody);
    }
}
