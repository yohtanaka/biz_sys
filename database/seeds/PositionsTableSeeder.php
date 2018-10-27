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
            ['code' => 0,   'name' => '一般'],
            ['code' => 1,   'name' => '代表取締役'],
            ['code' => 10,  'name' => '取締役'],
            ['code' => 20,  'name' => '執行役員'],
            ['code' => 30,  'name' => '部長'],
            ['code' => 35,  'name' => '次長'],
            ['code' => 40,  'name' => '課長'],
            ['code' => 45,  'name' => '課長代理'],
            ['code' => 50,  'name' => '係長'],
            ['code' => 60,  'name' => '主任'],
        ];
        DB::table('positions')->insert($positions);
    }
}
