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
            'limit_date' => "2022-11-28",
            'completion_date' => "2022-10-28",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "Todoアプリの要件定義",
            'limit_date' => "2022-11-29",
            'completion_date' => "2022-10-29",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "Todoアプリの画面設計",
            'limit_date' => "2022-12-03",
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "Todoアプリの機能設計",
            'limit_date' => Carbon::now()->addDay(30),
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "テーブルを作る",
            'limit_date' => Carbon::now()->addDay(31),
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "モデルを作る",
            'limit_date' => Carbon::now()->addDay(32),
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "コントローラーを作る",
            'limit_date' => Carbon::now()->addDay(33),
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "ビューを作る",
            'limit_date' => Carbon::now()->addDay(34),
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "入力したタスクを保存し、一覧に表示する",
            'limit_date' => Carbon::now()->addDay(35),
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "編集、削除処理をいれる",
            'limit_date' => Carbon::now()->addDay(36),
            'completion_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'name' => "テストをする",
            'limit_date' => Carbon::now()->addDay(37),
            'completion_date' => null,
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
        }
    }
}
