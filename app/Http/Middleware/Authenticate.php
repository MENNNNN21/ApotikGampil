<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            // Cek apakah URL-nya mengandung /admin, arahkan ke login admin
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login'); // pastikan route ini sudah ada
            }

            // Default redirect untuk user biasa
            return route('login');
        }

        return null;
    }
}
