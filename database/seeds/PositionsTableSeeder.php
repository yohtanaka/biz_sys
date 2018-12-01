<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['code' => 1,   'name' => '一般'],
            ['code' => 10,  'name' => '代表取締役'],
            ['code' => 20,  'name' => '取締役'],
            ['code' => 30,  'name' => '執行役員'],
            ['code' => 40,  'name' => '部長'],
            ['code' => 50,  'name' => '次長'],
            ['code' => 60,  'name' => '課長'],
            ['code' => 65,  'name' => '課長代理'],
            ['code' => 70,  'name' => '係長'],
            ['code' => 80,  'name' => '主任'],
        ];
        DB::table('positions')->truncate();
        DB::table('positions')->insert($positions);
    }
}
