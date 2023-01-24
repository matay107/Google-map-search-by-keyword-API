<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoadStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $load_status[] = array(
            'load_status' => 'L',
            'display_name' => 'Load Confirmed',
            'ordering' => '1'
        );
        $load_status[] = array(
            'load_status' => 'P',
            'display_name' => 'Pick Up',
            'ordering' => '2'
        );
        $load_status[] = array(
            'load_status' => 'Y',
            'display_name' => 'Yard Exit',
            'ordering' => '3'
        );
        $load_status[] = array(
            'load_status' => 'D',
            'display_name' => 'Dealer Arrived',
            'ordering' => '4'
        );
        $load_status[] = array(
            'load_status' => 'U',
            'display_name' => 'Unloaded Vehicle',
            'ordering' => '5'
        );

        DB::table('load_status')->insert($load_status);
    }
}
