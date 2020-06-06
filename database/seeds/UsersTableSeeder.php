<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Group;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('group_user')->truncate();

        $badmintonGroup = Group::where('name', 'badminton')->first();
        $footballGroup = Group::where('name', 'football')->first();
        $danceGroup = Group::where('name', 'dance')->first();
        $hockeyGroup = Group::where('name', 'hockey')->first();

        $tom = User::create([
            'name' => 'tom',
            'email' => 'tom@tom.com',
            'password' => Hash::make('password')
        ]);

        $dick = User::create([
            'name' => 'dick',
            'email' => 'dick@dick.com',
            'password' => Hash::make('password')
        ]);

        $harry = User::create([
            'name' => 'harry',
            'email' => 'harry@harry.com',
            'password' => Hash::make('password')
        ]);

        $tom->groups()->attach($badmintonGroup);
        $dick->groups()->attach($footballGroup);
        $harry->groups()->attach($danceGroup);
    }
}
