<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CitiesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('SectionsTableSeeder');
        $this->call('PositionsTableSeeder');
        $this->call('NewsTableSeeder');
    }
}
