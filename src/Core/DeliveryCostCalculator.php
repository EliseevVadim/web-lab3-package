<?php

namespace Lab3\AbstractShopPackage\Core;

use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Facades\Config;
use Lab3\AbstractShopPackage\GeoServices\GeocoderService;
use Lab3\AbstractShopPackage\GeoServices\GeoFenceService;
use Lab3\AbstractShopPackage\GeoServices\MathematicalGeoService;

class DeliveryCostCalculator
{
    public function instance()
    {
        return $this;
    }

    public function calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer)
    {
        $selectedService = config('abstract-shop-package.selected_geo_service');
        switch ($selectedService) {
            case "mathematical":
                $geoService = new MathematicalGeoService();
                break;
            case "geocoder":
                $geoService = new GeocoderService();
                break;
            case "geofence":
                $geoService = new GeoFenceService();
                break;
            default:
                throw new InvalidFormatException();
        }
        return $geoService->calculateCost($firstPointLatitude, $firstPointLongitude, $secondPointLatitude, $secondPointLongitude, $costOfKilometer);
    }
}
