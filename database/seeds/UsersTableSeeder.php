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
            'name'=>'Priatmoko',
            'email'=>'priatmoko.informatics@gmail.com',
            'username'=>'masterpis',
            'password'=>bcrypt('admin')
        ]);
    }
}
