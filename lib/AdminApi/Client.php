<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminApi;

use UserHub\Internal\Transport;

/**
 * The Admin API.
 *
 * @property Checkouts      $checkouts
 * @property Flows          $flows
 * @property Invoices       $invoices
 * @property Organizations  $organizations
 * @property PaymentMethods $paymentMethods
 * @property Pricing        $pricing
 * @property Roles          $roles
 * @property Subscriptions  $subscriptions
 * @property Users          $users
 */
class Client
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public function __get(string $name): mixed
    {
        switch ($name) {
            case 'checkouts':
                return new Checkouts($this->transport);

            case 'flows':
                return new Flows($this->transport);

            case 'invoices':
                return new Invoices($this->transport);

            case 'organizations':
                return new Organizations($this->transport);

            case 'paymentMethods':
                return new PaymentMethods($this->transport);

            case 'pricing':
                return new Pricing($this->transport);

            case 'roles':
                return new Roles($this->transport);

            case 'subscriptions':
                return new Subscriptions($this->transport);

            case 'users':
                return new Users($this->transport);

            default:
                trigger_error('Undefined property: '.static::class.'::$'.$name);

                return null;
        }
    }
}
