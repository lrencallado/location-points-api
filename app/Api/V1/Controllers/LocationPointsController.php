<?php

declare(strict_types=1);

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\GetLocationsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocationsWithinRadiusResource;
use App\Models\Location;
use App\Services\LocationPointsService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationPointsController extends Controller
{
    /**
     * Return a response of all Locations that fall within that radius
     * using the Haversine formula.
     *
     * @param GetLocationsRequest $request
     * @param LocationPointsService $locationPointsService
     * @param Location $location
     * @return ResourceCollection
     */
    public function getLocations(GetLocationsRequest $request, LocationPointsService $locationPointsService, Location $location): ResourceCollection
    {
        $locationWithinRadius = [];

        // Loop through the list of coordinations and check if each coordinate
        // is within the specified radius from the center point.
        foreach ($location->all() as $location) {
            $distance = $locationPointsService->haversineDistance($request->latitude, $request->longitude, $location->latitude, $location->longitude);

            if ($distance <= $request->radius) {
                $locationWithinRadius[] = $location;
            }
        }

        return LocationsWithinRadiusResource::collection(collect($locationWithinRadius));
    }
}
