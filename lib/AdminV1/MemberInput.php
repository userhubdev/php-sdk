<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Member input parameters.
 */
class MemberInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the user.
     */
    public string $userId;

    /**
     * The identifier of the role.
     *
     * This is currently limited to `member`, `admin`, and `owner`.
     */
    public string $roleId;

    public function __construct(
        null|string $userId = null,
        null|string $roleId = null,
    ) {
        $this->userId = $userId ?? '';
        $this->roleId = $roleId ?? '';
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'userId' => $this->userId ?? null,
            'roleId' => $this->roleId ?? null,
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
