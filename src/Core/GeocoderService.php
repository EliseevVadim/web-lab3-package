<?php

namespace Lab3\AbstractShopPackage\GeoServices;

use Bodunde\GoogleGeocoder\Geocoder;

class GeocoderService implements iGeoService
{
    public function calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer)
    {
        $geocoder = new Geocoder();
        $firstPoint = [
            'lat' => $firstPointLatitude,
            'lng' => $firstPointLongitude
        ];
        $secondPoint = [
            'lat' => $secondPointLatitude,
            'lng' => $secondPointLongitude
        ];
        $distance = $geocoder->getDistanceBetween($firstPoint, $secondPoint);
        return $distance * $costOfKilometer;
    }
}
