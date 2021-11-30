<?php

namespace Yomastrategic\YomafleetPaymentGateway;

use Illuminate\Support\ServiceProvider;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */

    protected $defer = false;

    public function boot()
    {
        $source = realpath($raw = __DIR__.'/../config/payment.php') ?: $raw;

        $this->publishes([$source => config_path('payment.php')]);

        $this->mergeConfigFrom($source, 'payment');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('yomafleet-payment-gateway.gateway', function ($app) {
            return new Gateway();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('yomafleet-payment-gateway.gateway');
    }
}
