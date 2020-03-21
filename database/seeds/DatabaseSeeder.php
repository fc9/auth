<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\PersonTableSeeder;
use Database\Seeders\MembershipTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PersonTableSeeder::class);
        $this->call(MembershipTableSeeder::class);
    }
}
