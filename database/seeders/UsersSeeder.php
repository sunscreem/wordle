<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([ 'name' => 'Ian', 'email' => 'meh1@meh.com', 'password' => bcrypt('password'), ] );
        User::create([ 'name' => 'Liz', 'email' => 'meh2@meh.com', 'password' => bcrypt('password'), ] );
        User::create([ 'name' => 'Rob', 'email' => 'meh3@meh.com', 'password' => bcrypt('password'), ] );
        User::create([ 'name' => 'Susan', 'email' => 'meh4@meh.com', 'password' => bcrypt('password'), ] );

    }
}
