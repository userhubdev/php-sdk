<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;
use UserHub\Internal\Util;

/**
 * A link between a account and an external account.
 */
final class AccountConnection implements \JsonSerializable, JsonUnserializable
{
    /**
     * The tenant connection.
     */
    public null|Connection $connection;

    /**
     * The external identifier of the connected account.
     */
    public string $externalId;

    /**
     * The external admin URL for the connected account.
     */
    public null|string $adminUrl;

    /**
     * The status of the connected account.
     */
    public string $state;

    /**
     * The code that best describes the reason for the state.
     */
    public null|string $stateReason;

    /**
     * The balance amount for the account.
     *
     * A negative value indicates an amount which will be subtracted from the next
     * invoice (credit).
     *
     * A positive value indicates an amount which will be added to the next
     * invoice (debt).
     */
    public null|string $balanceAmount;

    /**
     * The currency code for the account.
     */
    public null|string $currencyCode;

    /**
     * The payment methods for connections that support it.
     *
     * @var \UserHub\AdminV1\PaymentMethod[]
     */
    public array $paymentMethods;

    /**
     * The last time the account was pulled from the connection.
     */
    public null|\DateTimeInterface $pullTime;

    /**
     * The last time the account was pushed to the connection.
     */
    public null|\DateTimeInterface $pushTime;

    /**
     * The creation time of the account connection.
     */
    public \DateTimeInterface $createTime;

    /**
     * The last update time of the account connection.
     */
    public \DateTimeInterface $updateTime;

    /**
     * @param null|\UserHub\AdminV1\PaymentMethod[] $paymentMethods
     */
    public function __construct(
        null|Connection $connection = null,
        null|string $externalId = null,
        null|string $adminUrl = null,
        null|string $state = null,
        null|string $stateReason = null,
        null|string $balanceAmount = null,
        null|string $currencyCode = null,
        null|array $paymentMethods = null,
        null|\DateTimeInterface $pullTime = null,
        null|\DateTimeInterface $pushTime = null,
        null|\DateTimeInterface $createTime = null,
        null|\DateTimeInterface $updateTime = null,
    ) {
        $this->connection = $connection ?? null;
        $this->externalId = $externalId ?? '';
        $this->adminUrl = $adminUrl ?? null;
        $this->state = $state ?? '';
        $this->stateReason = $stateReason ?? null;
        $this->balanceAmount = $balanceAmount ?? null;
        $this->currencyCode = $currencyCode ?? null;
        $this->paymentMethods = $paymentMethods ?? [];
        $this->pullTime = $pullTime ?? null;
        $this->pushTime = $pushTime ?? null;
        $this->createTime = $createTime ?? Util::emptyDateTime();
        $this->updateTime = $updateTime ?? Util::emptyDateTime();
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'connection' => $this->connection ?? null,
            'externalId' => $this->externalId ?? null,
            'adminUrl' => $this->adminUrl ?? null,
            'state' => $this->state ?? null,
            'stateReason' => $this->stateReason ?? null,
            'balanceAmount' => $this->balanceAmount ?? null,
            'currencyCode' => $this->currencyCode ?? null,
            'paymentMethods' => $this->paymentMethods ?? null,
            'pullTime' => isset($this->pullTime) ? Util::encodeDateTime($this->pullTime) : null,
            'pushTime' => isset($this->pushTime) ? Util::encodeDateTime($this->pushTime) : null,
            'createTime' => isset($this->createTime) ? Util::encodeDateTime($this->createTime) : null,
            'updateTime' => isset($this->updateTime) ? Util::encodeDateTime($this->updateTime) : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            isset($data->{'connection'}) ? Connection::jsonUnserialize($data->{'connection'}) : null,
            $data->{'externalId'} ?? null,
            $data->{'adminUrl'} ?? null,
            $data->{'state'} ?? null,
            $data->{'stateReason'} ?? null,
            $data->{'balanceAmount'} ?? null,
            $data->{'currencyCode'} ?? null,
            isset($data->{'paymentMethods'}) ? Util::mapArray($data->{'paymentMethods'}, [PaymentMethod::class, 'jsonUnserialize']) : null,
            isset($data->{'pullTime'}) ? Util::decodeDateTime($data->{'pullTime'}) : null,
            isset($data->{'pushTime'}) ? Util::decodeDateTime($data->{'pushTime'}) : null,
            isset($data->{'createTime'}) ? Util::decodeDateTime($data->{'createTime'}) : null,
            isset($data->{'updateTime'}) ? Util::decodeDateTime($data->{'updateTime'}) : null,
        );
    }
}
