<?php

namespace Lab3\AbstractShopPackage;

use Illuminate\Support\ServiceProvider;

class CurrenciesConverterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('currencies.converter', function () {
            return new CurrenciesConverter();
        });
    }
}
