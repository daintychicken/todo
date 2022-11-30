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
        foreach (range(1, 7) as $num) {
            DB::table('todolists')->insert([
                'user_id' => 1,
                'name' => "管理者タスク {$num}",
                'limit_date' => Carbon::now()->addDay(30 + $num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        foreach (range(1, 7) as $num) {
            DB::table('todolists')->insert([
                'user_id' => 2,
                'name' => "開発部タスク {$num}",
                'limit_date' => Carbon::now()->addDay(30 + $num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        foreach (range(1, 7) as $num) {
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
