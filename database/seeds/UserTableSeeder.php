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
            'name'=>'Priatmoko',
            'email'=>'priatmoko.informatics@gmail.com',
            'username'=>'masterpis',
            'password'=>bcrypt('admin')
        ]);
    }
}
