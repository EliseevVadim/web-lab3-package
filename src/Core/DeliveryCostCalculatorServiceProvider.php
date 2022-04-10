<?php

namespace Lab3\AbstractShopPackage\Core;

use Illuminate\Support\ServiceProvider;

class DeliveryCostCalculatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('deliveryCost.calculator', function () {
            return new DeliveryCostCalculator();
        });
    }
}
