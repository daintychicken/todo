<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Todolist;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TodolistsSeeder extends Seeder
{

    public function run()
    {
        DB::table('todolists')->insert([
        [
            'user_id' => 1,
            'name' => "環境構築",
            'limit_date' => Carbon::now()->addDay(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "Todoアプリの要件定義",
            'limit_date' => Carbon::now()->addDay(31),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "Todoアプリの画面設計",
            'limit_date' => Carbon::now()->addDay(32),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "Todoアプリの機能設計",
            'limit_date' => Carbon::now()->addDay(33),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "テーブルを作る",
            'limit_date' => Carbon::now()->addDay(34),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "モデルを作る",
            'limit_date' => Carbon::now()->addDay(35),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "コントローラーを作る",
            'limit_date' => Carbon::now()->addDay(36),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "ビューを作る",
            'limit_date' => Carbon::now()->addDay(37),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "テストをする",
            'limit_date' => Carbon::now()->addDay(38),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ]);
        foreach (range(1, 7) as $num) {
            DB::table('todolists')->insert([
                'user_id' => 1,
                'name' => "管理者タスク {$num}",
                'limit_date' => Carbon::now()->addDay(40 + $num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('todolists')->insert([
                'user_id' => 2,
                'name' => "開発部タスク {$num}",
                'limit_date' => Carbon::now()->addDay(30 + $num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('todolists')->insert([
                'user_id' => 4,
                'name' => "購買部タスク {$num}",
                'limit_date' => Carbon::now()->addDay(30 + $num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
