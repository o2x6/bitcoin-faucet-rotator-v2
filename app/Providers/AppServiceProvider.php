<?php

namespace App\Providers;

use App\Models\User;
use Helpers\Functions\Users;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Validator::extend('valid_user_name', function($attribute, $value, $parameters, $validator) {

            $barredUserNamesLowerCase = ['admin', 'owner', 'manager'];

            foreach ($barredUserNamesLowerCase as $element) {
                if (strpos($element, strtolower($value) !== true)) {
                    return false;
                }
            }
            return true;
        });*/
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

    public function composer()
    {
    }
}
