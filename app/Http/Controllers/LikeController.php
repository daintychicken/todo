<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\User;

class LikeController extends Controller
{
    public function like(Request $request)
    {

    $users = User::find($request->id);

      Like::create([
        'user_id' => Auth::id(),
        'like_to' => $users->login_id,
      ]);

      return redirect()->back()->with('like',  'にいいねしました');
    }

    public function unlike($id)
    {

    $users = User::find($id);

      $like=Like::where('like_to', $users->login_id)->where('user_id', Auth::id())->first();
      $like->delete();

      return redirect()->back()->with('unlike', 'のいいねを取り消しました');
    }


}
