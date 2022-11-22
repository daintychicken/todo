<?php

namespace App\Http\Controllers;
use App\Models\Todolist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(Request $request)
    {
           //ログインしているユーザーのIDを取得
            $user_id = Auth::id();
            //検索キーワードを取得
            $keyword = $request->input('keyword');
            //選択されたステータスを取得
            $status = $request->input('status');
            //期限切れ判定用
            $today = date('Y-m-d');

            $query = Todolist::query();
            //もし検索キーワードが入力されていれば、検索結果を取得&ログインしているユーザーのタスクを変数に設定
            //検索キーワードが入力されていなければ、ログインしているユーザーのタスクを変数に設定
            if(!empty($keyword)) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->where('user_id', '=', "$user_id");
            //ステータス：完了を選択されたとき
            } elseif($status == 1) {
                $query->where('status', '=', "1")
                ->where('user_id', '=', "$user_id");
            } elseif($status == 2) {
                $query->whereNotNull('completion_date')
                ->where('user_id', '=', "$user_id");
            } elseif($status == 3) {
                $query->whereNotNull('limit_date')
                    ->where('limit_date', '<', "$today")
                    ->where('user_id', '=', "$user_id");
            } else {
                $query->where('user_id', '=', "$user_id");
            }
            //設定した変数の情報を期限が違い順に取得して、indexに返す
            $todolists = $query->orderByRaw('limit_date')->get();
            return view('todolist.index', compact('todolists', 'keyword'));

    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {
        //タスクの新規登録
        try {
            DB::beginTransaction();
            $todolists  =  new Todolist();
            //ユーザーIDはログインしているユーザーのIDを取得する
            $todolists->user_id = Auth::id();
            $todolists->name  =  $request->name;
            $todolists->text  =  $request->text;
            $todolists->limit_date  =  $request->limit_date;
            $todolists->save();
            DB::commit();
            return redirect()->route('todo.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withErrors([
            'error',
        ]);
    }

    public function show($id)
    {
        //受け取ったIDの情報をテーブルから取得
        $todolists = Todolist::find($id);
        //もし、ログインしているユーザーのIDと登録されているユーザーIDが違えばエラー画面に遷移
        if(Auth::id() != $todolists->user_id) {
            return redirect()->route('todo.login');
        } else {
            return view('todolist.show', [
                "todolists" => $todolists
            ]);
        }
    }

    public function edit($id)
    {
        $todolists = Todolist::find($id);
        if(Auth::id() != $todolists->user_id) {
            return redirect()->route('todo.login');
        } else {
            return view('todolist.edit', [
                "todolists" => $todolists
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $todolists = Todolist::find($request->id);
            if(Auth::id() != $todolists->user_id) {
                return redirect()->route('todo.login');
            } else {
                $todolists->name  =  $request->name;
                $todolists->text  =  $request->text;
                $todolists->limit_date  =  $request->limit_date;
                $todolists->completion_date  =  $request->completion_date;
                $todolists->save();
                DB::commit();
                return redirect()->route('todo.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withErrors([
            'error',
        ]);
    }

    public function softDeletes($id)
    {
        $todolists = Todolist::find($id);
        if(Auth::id() != $todolists->user_id) {
            return redirect()->route('todo.login');
        } else {
            Todolist::find($id)->delete();
            return redirect()->route('todo.index');
        }
    }
}
