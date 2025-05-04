<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Member input parameters.
 */
final class MemberInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the user.
     */
    public string $userId;

    /**
     * The identifier of the role.
     */
    public string $roleId;

    public function __construct(
        ?string $userId = null,
        ?string $roleId = null,
    ) {
        $this->userId = $userId ?? '';
        $this->roleId = $roleId ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'userId' => $this->userId,
            'roleId' => $this->roleId,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'userId'} ?? null,
            $data->{'roleId'} ?? null,
        );
    }
}
