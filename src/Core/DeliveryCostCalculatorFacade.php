<?php

namespace Lab3\AbstractShopPackage\Core;

use Illuminate\Support\Facades\Facade;

/**
 * @method static DeliveryCostCalculator instance()
 */
class DeliveryCostCalculatorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'deliveryCost.calculator';
    }
}
