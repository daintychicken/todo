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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'dev1',
                'password' => Hash::make('pass'),
                'name' => '開発部　青森',
                'dept' => '開発部',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'dev2',
                'password' => Hash::make('pass'),
                'name' => '開発部　秋田',
                'dept' => '開発部',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'purch1',
                'password' => Hash::make('pass'),
                'name' => '購買部　岡山',
                'dept' => '購買部',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'login_id' => 'purch2',
                'password' => Hash::make('pass'),
                'name' => '購買部　山口',
                'dept' => '購買部',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
