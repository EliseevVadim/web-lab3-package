<?php

namespace Lab3\AbstractShopPackage\GeoServices;

interface iGeoService
{
    public function calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer);
}
