<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            ['code' => 1,  'name' => '役員'],
            ['code' => 2,  'name' => '総務部'],
            ['code' => 3,  'name' => '経理部'],
            ['code' => 4,  'name' => '営業部'],
            ['code' => 5,  'name' => '製造部'],
            ['code' => 6,  'name' => '販売部'],
            ['code' => 7,  'name' => '開発部'],
            ['code' => 8,  'name' => '人事部'],
            ['code' => 9,  'name' => '企画部'],
            ['code' => 10, 'name' => '業務部'],
            ['code' => 11, 'name' => '情報システム部'],
        ];
        DB::table('sections')->insert($sections);
    }
}
