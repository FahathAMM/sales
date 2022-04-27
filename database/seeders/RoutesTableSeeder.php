<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add to dummy data for routes
        DB::table('routes')->truncate();

        $routes = [
            [
                'name'        => 'colombo',
            ],

            [
                'name'        => 'ampare',
            ],

            [
                'name'        => 'jaffna',
            ],

            [
                'name'        => 'kurunagala',
            ],

            [
                'name'        => 'baticalo',
            ],


        ];

        foreach ($routes as $route) {
            DB::table('routes')->insert($route);
        }
    }
}
