<?php

namespace Lab3\AbstractShopPackage\Core;

class MathematicalGeoService implements iGeoService
{
    private const EarthRadius = 6371;

    public function calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer)
    {
        $firstPointLatitudeInRadians = deg2rad($firstPointLatitude);
        $firstPointLongitudeInRadians = deg2rad($firstPointLongitude);
        $secondPointLatitudeInRadians = deg2rad($secondPointLatitude);
        $secondPointLongitudeInRadians = deg2rad($secondPointLongitude);
        $distance = 2 * self::EarthRadius *
            asin(sqrt(pow(sin(($secondPointLatitudeInRadians - $firstPointLatitudeInRadians) / 2), 2)
            + cos($firstPointLatitudeInRadians) * cos($secondPointLatitudeInRadians)
                * pow(sin(($secondPointLongitudeInRadians - $firstPointLongitudeInRadians) / 2), 2)));
        return $distance * $costOfKilometer;
    }
}
