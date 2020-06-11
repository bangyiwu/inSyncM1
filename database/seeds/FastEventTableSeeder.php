<?php

use Illuminate\Database\Seeder;

class FastEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('fast_events')->insert([
            [
                'title' => 'Training',
                'user_id'=>'1',
                'start' => '21:30:00',
                'end' => '23:30:00',
                'color' => '#c40233',
                'description' => 'Badminton at MPSH'
            ],
            [
                'title' => 'Dance Practice',
                'user_id'=>'1',
                'start' => '21:30:00',
                'end' => '23:30:00',
                'color' => '#29fdf2',
                'description' => 'DP Dance 7'
            ]

        ]);
    }
}
