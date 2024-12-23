<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'payu-money-payment-cancel',
        'payu-money-payment-success',
        'payment-cancel',
        'payment-success',
        'webhook_pum_success',
        'webhook_pum_fail'
    ];
}
