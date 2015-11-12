<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // register custom validation rule for a function attribute
        Validator::extend('function',
            function ($attribute, $value, $parameters, $validator) {
                return function_exists($value);
            });

        // register custom validation error message for a function attribute
        Validator::replacer('function',
            function ($message, $attribute, $rule, $parameters) {
                // return the error message with $attribute stripped of special
                // characters
                return "The " . preg_replace("/[^A-Za-z0-9]/", " ",
                    $attribute) . " must be a " . $rule . ".";
            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
