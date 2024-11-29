<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Response message for CreatePortalSession.
 */
final class CreatePortalSessionResponse implements \JsonSerializable, JsonUnserializable
{
    /**
     * The URL you should redirect the user to after calling create portal
     * session.
     */
    public string $redirectUrl;

    public function __construct(
        ?string $redirectUrl = null,
    ) {
        $this->redirectUrl = $redirectUrl ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'redirectUrl' => $this->redirectUrl ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'redirectUrl'} ?? null,
        );
    }
}
