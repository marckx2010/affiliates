<?php declare(strict_types=1);
namespace App\Traits;

trait CoordinateInputTrait {
    /**
     * @param float $latitude
     * @return bool
     */
    private function validLatitude(float $latitude): bool
    {
        return (abs($latitude) <= 90);
    }

    /**
     * @param float $longitude
     * @return bool
     */
    private function validLongitude(float $longitude): bool
    {
        return (abs($longitude) <= 180);
    }

    /**
     * convert to lat/long array suitable for map
     *
     * @param object $coordinate
     * @return array|null
     */
    private function makeLatLng(object $coordinate): array | null
    {
        return ($this->validLatitude($coordinate->latitude) && $this->validLongitude($coordinate->longitude)) ?
            [$coordinate->latitude, $coordinate->longitude] : null;
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @return object|null
     */
    private function makeLatLngObject(float $latitude, float $longitude): object | null
    {
        return ($this->validLatitude($latitude) && $this->validLongitude($longitude)) ?
            (object)['latitude' => $latitude, 'longitude' => $longitude] : null;
    }

    /**
     * We're using the Haversine formula to calculate distance between two points on earth
     *
     * @param object $coordinateHome
     * @param object $coordinate
     * @param int $precision
     * @return float
     */
    function distanceFromHome(object $coordinateHome, object $coordinate, int $precision = 4): float
    {
        $earthRadius = 6371.01;

        $phi1 = deg2rad($coordinateHome->latitude);
        $phi2 = deg2rad($coordinate->latitude);
        $deltaPhi = deg2rad($coordinate->latitude - $coordinateHome->latitude);
        $deltaLambda = deg2rad($coordinate->longitude - $coordinateHome->longitude);

        $a = sin($deltaPhi / 2) ** 2 + cos($phi1) * cos($phi2) * sin($deltaLambda / 2) ** 2;
        $distance = 2 * $earthRadius * asin(sqrt($a));

        return ROUND($distance, $precision);
    }

}
