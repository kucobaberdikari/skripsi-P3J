<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'perawatan/delete/{id}',
        'perbaikan/delete/{id}',
        'perawatan/showproses/{id}',
        'perawatan/show/{id}',
        'perawatan/edit/{id}',
        'showproses/{id}',
        'perawatan/show/{id}',
        'perawatan/update',
    ];
}
