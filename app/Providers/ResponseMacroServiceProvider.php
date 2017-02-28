<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/** CREATES A MARCO FOR RESPONSES **/

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Response::macro('success', function ($data) {
            return \Response::json([
              'success'  => true,
              'data' => $data,
            ]);
        });

        \Response::macro('error', function ($message, $status = 400, $data = []) {
            return \Response::json([
              'success'  => false,
              'message' => $message,
              'data' => $data,
            ], $status);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
