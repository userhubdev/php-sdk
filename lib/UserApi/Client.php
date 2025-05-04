<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserApi;

use UserHub\Internal\Transport;

/**
 * The User API.
 *
 * @property BillingAccount $billingAccount
 * @property Checkouts      $checkouts
 * @property Flows          $flows
 * @property Invoices       $invoices
 * @property Organizations  $organizations
 * @property PaymentMethods $paymentMethods
 * @property Pricing        $pricing
 * @property Roles          $roles
 * @property Session        $session
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
            case 'billingAccount':
                return new BillingAccount($this->transport);

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

            case 'session':
                return new Session($this->transport);

            default:
                trigger_error('Undefined property: '.static::class.'::$'.$name);

                return null;
        }
    }
}
