<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('events')->insert([
            [
                'title' => 'Training',
                'start' => '2020-05-29 21:30:00',
                'end' => '2020-05-29 23:30:00',
                'color' => '#c40233',
                'description' => 'Badminton at MPSH'
            ],
            [
                'title' => 'Dance Practice',
                'start' => '2020-05-30 21:30:00',
                'end' => '2020-05-30 23:30:00',
                'color' => '#29fdf2',
                'description' => 'DP Dance 7'
            ]

        ]);
    }
}
