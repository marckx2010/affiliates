<?php declare(strict_types=1);

namespace App\Models;

use App\Traits\CoordinateInputTrait;

class Affiliate
{
    use CoordinateInputTrait;

    public array $homeOfficeLatLng;
    public object $homeOfficeCoordinate;

    public ?object $errorContext = null;

    public function __construct()
    {
        // NB: single place this is defined throughout application
        $this->homeOfficeCoordinate = (object)['latitude' => 52.6638, 'longitude' => -8.6267];
        $this->homeOfficeLatLng = $this->makeLatLng($this->homeOfficeCoordinate);
    }

    /**
     * @param $affiliatesContents
     * @param $row
     * @return object
     */
    private function constructErrorContext($affiliatesContents, $row): object
    {
        $this->errorContext = (object)[
            'affiliates' => $affiliatesContents,
            'row' => $row
        ];
        return $this->errorContext;
    }

    /**
     * @param object $entry
     * @return object|null
     */
    public function checkEntry(object $entry): object|null
    {
        if (isset($entry->name)
            && isset($entry->affiliate_id)
            && isset($entry->latitude)
            && isset($entry->longitude)
            && $this->validLatitude((float)$entry->latitude)
            && $this->validLongitude((float)$entry->longitude)) {
            $coordinate = $this->makeLatLngObject((float)$entry->latitude, (float)$entry->longitude);
            return (object)[
                'affiliate_id' => $entry->affiliate_id,
                'name' => $entry->name,
                'distance' => $this->distanceFromHome($this->homeOfficeCoordinate, $coordinate),
                'latLng' => $this->makeLatLng($coordinate)
            ];
        } else {
            return null;
        }
    }

    /**
     * Open and parse the affiliates text file
     * On failure set errorContext object and return null
     *
     * @return array|null
     */
    public function readFile(): array|null
    {
        /*
         * It is a .txt file - not a .json file - but let's see if we can decode it to JSON
         */
        $affiliatesFile = storage_path('affiliates.txt');
        $affiliatesContents = file_get_contents($affiliatesFile);
        $affiliatesJson = json_decode($affiliatesContents, true);

        if (!$affiliatesJson) {
            // Oh well, we tried. But maybe we can do something with a list of JSON data rows? Let's try!
            // really clever use of array_map callback
            $rows = array_map('json_decode', file($affiliatesFile));
        } else {
            $rows = $affiliatesJson;
        }

        // Do we have some rows? Good then check they are all valid.
        if ($rows) {
            $affiliates = collect();

            foreach ($rows as $row) {
                $affiliateEntry = $this->checkEntry($row);
                if (!$affiliateEntry) {
                    $this->constructErrorContext($affiliatesContents, $row);
                    return null;
                }

                $affiliates->push($affiliateEntry);
            }
        } else {
            $this->constructErrorContext($affiliatesContents, null);
            return null;
        }

        return $affiliates->sortBy('affiliate_id')->toArray();
    }
}
