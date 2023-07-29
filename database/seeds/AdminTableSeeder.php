<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name'=>'nassib',
            'email'=>'nassib@nassib.com',
            'password'=>bcrypt('password')
        ]);
    }
}
