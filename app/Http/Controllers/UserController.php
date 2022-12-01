<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        //ユーザー情報取得
        $user = Auth::user();
        //ユーザーが取得したいいね！の数をカウント
        $count = Like::where('like_to', $user->login_id)->count();

        return view('user.index', compact('user', 'count'));
    }

    public function store(Request $request)
    {
        // アップロードされたファイルの取得
        $img = $request->file('my_photo');
        //storage > public > img配下に画像が保存される
        $path = isset($img) ? $img->store('public') : '';

        User::create([
            'my_photo' => $path,
        ]);
        return redirect()->route('user.index');
    }

    public function edit()
    {
        return view('user.edit', [
            "user" => Auth::user()
        ]);

    }

    public function update(Request $request)
    {
        $users = User::find($request->id);
        $users->name  =  $request->name;
        $users->gender  =  $request->gender;
        $users->birthday  =  $request->birthday;

        try {
            if ($request->hasFile('my_photo')) {
                //画像フォームでリクエストした画像を取得
                $img = $request->file('my_photo');

                //storage > public > img配下に画像が保存される
                $path = $img->store('public');
                $users->my_photo = basename($path);
            }
            $users->save();
            return redirect()->route('user.index')->with('message', 'プロフィールを更新しました');
        } catch (\Exception $e) {
            return back()->with('message', 'プロフィールを更新できませんでした 内容をご確認ください');
        }
    }

    public function show($id)
    {
        //受け取ったIDの情報をテーブルから取得
        $users = User::find($id);
        $like = Like::where('like_to', $users->login_id)->where('user_id', Auth::id())->first();

        return view('user.show', [
            "users" => $users,
            "like" => $like
        ]);
    }

    public function search(Request $request)
    {
        //ログインしているユーザーのIDを取得
        $user_id = Auth::id();
        //検索キーワードを取得
        $keyword = $request->input('keyword');

        //データベース取得
        $query = User::query();

        //もし検索キーワードが入力されていれば、検索結果を取得
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        //設定した変数の情報を期限が早い順に取得して、indexに返す
        $users = $query->orderByRaw('id')->paginate(5);
        return view('user.search', compact('users', 'keyword'));
    }
}
