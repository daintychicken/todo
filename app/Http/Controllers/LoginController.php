<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// 追加分
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    //ログインページの表示
    public function getLogin()
    {
    return view('todolist.login');
    }

    //ログイン認証
    public function postLogin(Request $request)
    {
    if (Auth::attempt(['login_id' => $request->input('login_id'), 'password' => $request->input('password')])) {
        return redirect()->route('todo.index');
    }
    return back()->with('message', 'ユーザー名かパスワードが間違っています');
    }

    //ログアウト
    public function getLogout(){
        Auth::logout();
        return redirect()->route('todo.login');
        }
}


