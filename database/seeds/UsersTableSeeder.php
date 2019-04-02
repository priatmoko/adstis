<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create user dump
        \App\User::create([
            'name'=>'Laravel Stisla',
            'email'=>'stisla@laravel.adstis',
            'username'=>'adstis',
            'password'=>bcrypt('admin@stisla')
        ]);
    }
}
