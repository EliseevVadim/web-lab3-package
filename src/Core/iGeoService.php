<?php

namespace Lab3\AbstractShopPackage\Core;

interface iGeoService
{
    public function calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer);
}
