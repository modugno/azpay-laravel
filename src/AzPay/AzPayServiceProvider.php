<?php

namespace AzPayLaravel\AzPay;

use Illuminate\Support\ServiceProvider;

class AzPayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Muda o Config para Config do Laravel
        $this->publishes([
            __DIR__ . '/Config/azpay.php' => config_path('azpay.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AZPay', function() {
            return new AZPay;
        });
    }
}
