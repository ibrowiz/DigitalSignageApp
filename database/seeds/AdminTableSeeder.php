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

       DB::table('Admins')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' =>'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
