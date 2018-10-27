<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'last_name'  => 'マスター',
                'first_name' => '管理者',
                'role'       => 2,
                'email'      => 'master@master.jp',
                'password'   => Hash::make('master')
            ]
        ];
        DB::table('users')->insert($users);
    }
}
