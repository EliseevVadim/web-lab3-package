<?php

namespace Lab3\AbstractShopPackage\Core;

use KMLaravel\GeographicalCalculator\Classes\GeographicalCalculator;

class GeoCalculatorService implements iGeoService
{
    public function calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer)
    {
        $geoCalculator = new GeographicalCalculator();
        $geoCalculator->initCoordinates($firstPointLatitude, $secondPointLatitude, $firstPointLongitude, $secondPointLongitude);
        $distance = $geoCalculator->getDistance()['km'];
        return $distance * $costOfKilometer;
    }
}
