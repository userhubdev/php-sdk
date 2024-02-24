<?php

declare(strict_types=1);

namespace UserHub\Webhook;

use UserHub\Code;
use UserHub\Internal\Constants;
use UserHub\Undefined;
use UserHub\UserHubError;

/**
 * @param string                          $signingSecret
 * @param null|callable(\Exception): void $onError
 */
class BaseWebhook
{
    private string $signingSecret;

    /**
     * @var array<string, callable(Request): Response>
     */
    private array $handlers;
    private null|\Closure $onError;

    public function __construct(
        string $signingSecret,
        null|callable|Undefined $onError = new Undefined(),
    ) {
        $this->signingSecret = $signingSecret;
        $this->handlers = [];
        if ($onError instanceof Undefined) {
            $this->onError = self::defaultOnError(...);
        } else {
            $this->onError = isset($onError) ? $onError(...) : null;
        }
    }

    /**
     * Executes a handler based on specified Request.
     */
    public function __invoke(Request $req): Response
    {
        try {
            $this->verify($req);

            $action = $req->getAction();

            $handler = $this->handlers[$action] ?? null;
            if (!isset($handler)) {
                if ('challenge' === $action) {
                    return $this->challengeHandler($req);
                }

                $handler = $this->handlers[''] ?? null;
                if (!isset($handler)) {
                    return $this->unimplementedHandler($req);
                }
            }

            return \call_user_func($handler, $req);
        } catch (\Exception $ex) {
            return $this->createResponse($ex);
        }
    }

    /**
     * Registers a handler for the specified action.
     *
     * @param string                           $name    is the action name
     * @param null|callable(Request): Response $handler is the action handler
     *
     * @return static
     */
    public function onAction(string $name, null|callable $handler): self
    {
        if (isset($handler)) {
            $this->handlers[$name] = $handler;
        } else {
            if (\array_key_exists($name, $this->handlers)) {
                unset($this->handlers[$name]);
            }
        }

        return $this;
    }

    /**
     * Registers a fallback action handler.
     *
     * @param null|callable(Request): Response $handler is the fallback handler
     *
     * @return static
     */
    public function onDefault(null|callable $handler): self
    {
        return $this->onAction('', $handler);
    }

    /**
     * Ensures the body matches the specified signature/timestamp and throws
     * an error if verification fails.
     *
     * @throws UserHubError
     */
    public function verify(Request $req): void
    {
        if (empty($this->signingSecret)) {
            throw new UserHubError('Signing secret is required');
        }
        if (empty($req->headers) || 0 === \count($req->headers)) {
            throw new UserHubError('Headers are required');
        }
        if (empty($req->body)) {
            throw new UserHubError('Body is required');
        }

        $req->getAction();
        $timestamp = $req->getTimestamp();
        $signatures = $req->getSignatures();

        if (!is_numeric($timestamp)) {
            throw new UserHubError("Timestamp is invalid: {$timestamp}");
        }

        $diff = (time() - (int) $timestamp) * 1000;
        if ($diff > Constants::WEBHOOK_MAX_TIMESTAMP_DIFF_MS) {
            throw new UserHubError("Timestamp is too far in the past: {$timestamp}");
        }
        if ($diff < -Constants::WEBHOOK_MAX_TIMESTAMP_DIFF_MS) {
            throw new UserHubError("Timestamp is too far in the future: {$timestamp}");
        }

        $digest = hash_hmac('sha256', $timestamp.'.'.$req->body, $this->signingSecret);

        $matched = false;

        if (!empty($digest)) {
            foreach ($signatures as $signature) {
                if (hash_equals($signature, $digest)) {
                    $matched = true;

                    break;
                }
            }
        }

        if (!$matched) {
            throw new UserHubError('Signatures do not match');
        }
    }

    /**
     * Creates a response from an object that can be encoded
     * using json_encode or an Exception.
     */
    public function createResponse(mixed $value): Response
    {
        if ($value instanceof \Exception) {
            $this->tryOnError($value);
        }

        return Util::createResponse($value);
    }

    /**
     * This handles an HTTP request from the global PHP environment.
     *
     * The headers are parsed from `getallheaders` or $_SERVER, the
     * payload is read `php://input`, and the result is written to
     * `php://output`.
     */
    public function handleFromGlobals(): void
    {
        if (\function_exists('getallheaders')) {
            $headers = getallheaders();
        } else {
            $headers = [];

            foreach ($_SERVER as $name => $value) {
                if (!str_starts_with($name, 'HTTP_')) {
                    continue;
                }
                $name = str_replace('_', '-', strtolower(substr($name, 5)));
                $headers[$name] = $value;
            }
        }

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $body = file_get_contents('php://input', length: Constants::WEBHOOK_MAX_REQUEST_SIZE_BYTES + 1) ?: '';

            if (\strlen($body) === Constants::WEBHOOK_MAX_REQUEST_SIZE_BYTES + 1) {
                $res = $this->createResponse(new UserHubError('Request body exceeded max length'));
            } else {
                $res = $this(new Request($headers, $body));
            }
        } else {
            $res = $this->createResponse(new UserHubError('Request should be a POST: '.$_SERVER['REQUEST_METHOD']));
        }

        foreach ($res->headers as $name => $value) {
            header($name.': '.$res->headers->get($name));
        }

        http_response_code($res->statusCode);

        file_put_contents('php://output', $res->body);
    }

    private function tryOnError(\Exception $ex): void
    {
        if (isset($this->onError)) {
            try {
                \call_user_func($this->onError, $ex);
            } catch (\Exception) {
                // ignore error
            }
        }
    }

    private static function defaultOnError(\Exception $ex): void
    {
        error_log('UserHub webhook: '.$ex->getMessage());
    }

    private static function challengeHandler(Request $req): Response
    {
        return Util::createResponse($req->body);
    }

    /**
     * @throws UserHubError
     */
    private static function unimplementedHandler(Request $req): Response
    {
        $name = $req->getAction();

        throw new UserHubError("Handler not implemented: {$name}", apiCode: Code::Unimplemented);
    }
}
