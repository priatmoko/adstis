<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'Laravel Stisla',
            'email'=>'stisla@laravel.adstis',
            'username'=>'adstis',
            'password'=>bcrypt('admin@stisla')
        ]);
    }
}
