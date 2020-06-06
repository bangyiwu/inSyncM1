<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();
        Group::create(['name' => 'dance']);
        Group::create(['name' => 'badminton']);
        Group::create(['name' => 'football']);
        Group::create(['name' => 'hockey']);
    }
}
