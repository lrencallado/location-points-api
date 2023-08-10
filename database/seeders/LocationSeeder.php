<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvData = fopen(base_path('database/csv/locations.csv'), 'r');

        while(($data = fgetcsv($csvData)) !== false) {
            Location::create([
                'name' => $data[0],
                'latitude' => $data[1],
                'longitude' => $data[2],
            ]);
        }

        fclose($csvData);
    }
}
