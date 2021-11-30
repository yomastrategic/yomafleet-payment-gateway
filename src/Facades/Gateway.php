<?php

namespace Yomastrategic\YomafleetPaymentGateway\Facades;

use Illuminate\Support\Facades\Facade;

class Gateway extends Facade 
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'yomafleet-payment-gateway.gateway'; }

}
