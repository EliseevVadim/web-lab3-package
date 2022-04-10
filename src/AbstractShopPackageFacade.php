<?php

namespace Lab3\AbstractShopPackage;

use Illuminate\Support\Facades\Facade;

class AbstractShopPackageFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'abstract-shop-package';
    }
}
