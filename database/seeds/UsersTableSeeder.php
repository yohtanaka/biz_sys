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
                'email'         => 'master@master.jp',
                'password'      => Hash::make('master'),
                'code'          => 1,
                'last_name'     => 'マスター',
                'first_name'    => '管理者',
                'gender'        => 1,
                'role'          => 2,
                'section_code'  => 11,
                'position_code' => 10
            ], [
                'email'         => 'test@test.jp',
                'password'      => Hash::make('test'),
                'code'          => 2,
                'last_name'     => 'タナカ',
                'first_name'    => 'テスト',
                'gender'        => 1,
                'role'          => 5,
                'section_code'  => 10,
                'position_code' => 20
            ], [
                'email'         => 'test2@test.jp',
                'password'      => Hash::make('test'),
                'code'          => 3,
                'last_name'     => 'タナカ',
                'first_name'    => 'テスト',
                'gender'        => 2,
                'role'          => 5,
                'section_code'  => 9,
                'position_code' => 30
            ]
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($users);
        factory(App\Models\User::class, 10)->create();
    }
}
