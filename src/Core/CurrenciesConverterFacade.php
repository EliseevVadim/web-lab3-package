<?php

namespace Lab3\AbstractShopPackage\Core;

use Illuminate\Support\Facades\Facade;

/**
 * @method static CurrenciesConverter instance()
 */
class CurrenciesConverterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'currencies.converter';
    }
}
