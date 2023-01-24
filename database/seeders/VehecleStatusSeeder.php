<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehecleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicle_status[] = array(
          'vin_status' => 'I',
          'display_name' => 'In Transit',
          'ordering' => '1'
        );
        $vehicle_status[] = array(
          'vin_status' => 'R',
          'display_name' => 'Received',
          'ordering' => '2'
        );
        $vehicle_status[] = array(
          'vin_status' => 'L',
          'display_name' => 'Load Confirmed',
          'ordering' => '3'
        );
        $vehicle_status[] = array(
          'vin_status' => 'P',
          'display_name' => 'Pick Up',
          'ordering' => '4'
        );
        $vehicle_status[] = array(
          'vin_status' => 'Y',
          'display_name' => 'Yard Exit',
          'ordering' => '5'
        );
        $vehicle_status[] = array(
          'vin_status' => 'D',
          'display_name' => 'Dealer Arrived',
          'ordering' => '6'
        );
        $vehicle_status[] = array(
          'vin_status' => 'U',
          'display_name' => 'Unloaded Vehicle',
          'ordering' => '7'
        );

        DB::table('vehicle_status')->insert($vehicle_status);
    }
}
