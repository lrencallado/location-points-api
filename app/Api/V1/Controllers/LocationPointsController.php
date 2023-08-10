<?php

declare(strict_types=1);

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\GetLocationsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocationsWithinRadiusResource;
use App\Models\Location;
use App\Services\LocationPointsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationPointsController extends Controller
{
    public function getLocations(GetLocationsRequest $request, LocationPointsService $locationPointsService, Location $location): ResourceCollection
    {
        $latitude = floatval($request->latitude);
        $longitude = floatval($request->longitude);
        $radius = $request->radius;

        $locationWithinRadius = [];

        foreach ($location->all() as $location) {
            $distance = $locationPointsService->haversineDistance($latitude, $longitude, floatval($location->latitude), floatval($location->longitude));

            if ($distance <= $radius) {
                $locationWithinRadius[] = $location;
            }
        }

        return LocationsWithinRadiusResource::collection(collect($locationWithinRadius));
    }
}
