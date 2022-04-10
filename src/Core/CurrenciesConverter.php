<?php

namespace Lab3\AbstractShopPackage;


use AmrShawky\Currency\Currency;

class CurrenciesConverter
{
    public function instance()
    {
        return $this;
    }

    public function convert($from, $to, $amount = 1)
    {
        return (new Currency)->convert()
            ->from($from)
            ->to($to)
            ->amount($amount)
            ->get();
    }
}
