<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    // 配列内の要素を書き込み可能にする
    protected $fillable = ['from_user_id', 'like_to'];

}
