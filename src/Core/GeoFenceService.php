<?php

namespace Lab3\AbstractShopPackage\Core;

use Salman\GeoFence\Service\GeoFenceCalculator;

class GeoFenceService implements iGeoService
{
    public function calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer)
    {
        $calculator = new GeoFenceCalculator();
        $distance = $calculator->CalculateDistance($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude);
        return $distance * $costOfKilometer;
    }

}
