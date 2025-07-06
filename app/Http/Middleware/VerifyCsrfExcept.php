<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfExcept extends Middleware
{
    /**
     * URIs que serão ignoradas no CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        'stripe/webhook',
    ];
}
