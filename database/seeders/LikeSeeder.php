<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{

    public function run()
    {
        foreach (range(1, 5) as $num) {
            DB::table('likes')->insert([
                'from_user_id' => "{$num}",
                'like_to' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('likes')->insert([
                'from_user_id' => "{$num}",
                'like_to' => 'dev1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('likes')->insert([
                'from_user_id' => "{$num}",
                'like_to' => 'purch1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
