<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = collect([
            ['name' => 'Technical University of Mombasa', 'address' => '', 'latitude' => 4.0375, 'longitude' => 39.6684],
            ['name' => 'Tudor', 'address' => '', 'latitude' => 4.0340, 'longitude' => 39.6647],
            ['name' => 'Tononoka', 'address' => '', 'latitude' => 4.0474, 'longitude' => 39.6692],
            ['name' => 'Majengo', 'address' => '', 'latitude' => 4.0547, 'longitude' => 39.6636],
            ['name' => 'Kongowea', 'address' => '', 'latitude' => 4.0392, 'longitude' => 39.6919],
            ['name' => 'Ziwa la Ngombe', 'address' => '', 'latitude' => 4.0260, 'longitude' => 39.6999],
            ['name' => 'Makadara', 'address' => '', 'latitude' => 4.0606, 'longitude' => 39.6763],
            ['name' => 'Bamburi', 'address' => '', 'latitude' => 4.0043, 'longitude' => 39.7153],
            ['name' => 'Likoni', 'address' => '', 'latitude' => 4.0841, 'longitude' => 39.6608],
            ['name' => ' Airport', 'address' => '', 'latitude' => 4.0367, 'longitude' => 39.5956],
            ['name' => 'Miritini', 'address' => '', 'latitude' => 3.9956, 'longitude' => 39.6001],
        ]);

        foreach ($locations as $location) {
            DB::table('locations')->insert([
                'name' => $location['name'],
                'address' => $location['address'],
                'latitude' => $location['latitude'],
                'longitude' => $location['longitude'],
                'created_at' => Carbon::now()
            ]);
        }
    }
}
