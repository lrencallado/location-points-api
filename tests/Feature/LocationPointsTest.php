<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class LocationPointsTest extends TestCase
{
    public function test_latitude_and_longitude_invalid_range_error(): void
    {
        $response = $this->json('GET', 'api/v1/location-points?latitude=91&longitude=181&radius=100');

        $response->assertStatus(422)->assertJsonValidationErrors(['latitude', 'longitude']);
    }

    public function test_location_within_radius_only(): void
    {

    }
}
