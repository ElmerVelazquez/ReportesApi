<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('strict_integer', function ($attribute, $value, $parameters, $validator) {
            return is_int($value);
        }, 'El campo :attribute debe ser un entero.');

        Validator::extend('strict_boolean', function ($attribute, $value, $parameters, $validator) {
            return is_bool($value);
        }, 'El campo :attribute debe ser un booleano (true/false).');

    }
}
