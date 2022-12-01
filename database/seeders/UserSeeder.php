<?php

namespace Database\Seeders;

use App\Models\Todolist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            [
                'login_id' => 'admin',
                'password' => Hash::make('pass'),
                'name' => '田中',
                'dept' => '管理者',
                'birthday' => '2000-01-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'dev1',
                'password' => Hash::make('pass'),
                'name' => '開発部　青森',
                'dept' => '開発部',
                'birthday' => '2000-02-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'dev2',
                'password' => Hash::make('pass'),
                'name' => '開発部　秋田',
                'dept' => '開発部',
                'birthday' => '2000-03-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'purch1',
                'password' => Hash::make('pass'),
                'name' => '購買部　岡山',
                'dept' => '購買部',
                'birthday' => '2000-04-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'purch2',
                'password' => Hash::make('pass'),
                'name' => '購買部　山口',
                'dept' => '購買部',
                'birthday' => '2000-05-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'plan1',
                'password' => Hash::make('pass'),
                'name' => '企画部　千葉',
                'dept' => '企画部',
                'birthday' => '2000-06-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'plan2',
                'password' => Hash::make('pass'),
                'name' => '企画部　埼玉',
                'dept' => '企画部',
                'birthday' => '2000-07-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'legal1',
                'password' => Hash::make('pass'),
                'name' => '法務部　京都',
                'dept' => '法務部',
                'birthday' => '2000-08-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'legal2',
                'password' => Hash::make('pass'),
                'name' => '法務部　滋賀',
                'dept' => '法務部',
                'birthday' => '2000-010-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
