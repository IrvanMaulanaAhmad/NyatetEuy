<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'roles' => "admin",
        	'username' => "admin",
        	'password' => Hash::make('admin123'),
        	'balance' => 0
        ]);

        DB::table('users')->insert([
        	'roles' => "user",
        	'username' => "user1",
        	'password' => Hash::make('user1234'),
        	'balance' => 0
        ]);

        DB::table('users')->insert([
        	'roles' => "user",
        	'username' => "user2",
        	'password' => Hash::make('user1234'),
        	'balance' => 0
        ]);

        DB::table('users')->insert([
        	'roles' => "user",
        	'username' => "user3",
        	'password' => Hash::make('user1234'),
        	'balance' => 0
        ]);
    }
}
