<?php

namespace App\Http\Controllers;
use App\Models\Todolist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
        //データベース取得
        $query = Todolist::query();
        //ログインしているユーザーのタスクを表示する
        $query->where('user_id', '=', $user_id);

        //もし検索キーワードが入力されていれば、検索結果を取得
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        //もしステータスが選択されていれば、ステータスの絞り込み
        if(!empty($status)) {
            if($status == "done") {
                $query->whereNotNull('completion_date');
            } elseif($status == "past") {
                $query->whereNotNull('limit_date')
                    ->where('limit_date', '<', "$today");
            } elseif($status == "work") {
                $query->where(function ($query) use ($today){
                    $query->whereNull('completion_date')
                    ->where('limit_date', '>', "$today")
                    ->orwhereNull('limit_date')
                    ->whereNull('completion_date');
                });
            }
        }
        //設定した変数の情報を期限が早い順に取得して、indexに返す
        $todolists = $query->orderByRaw('limit_date')->paginate(5);
        return view('todolist.index', ['user' => Auth::user()], compact('todolists', 'keyword', 'status'));
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
            return redirect()->route('todo.index')->with('message', 'タスクを登録しました');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', '登録できませんでした 入力内容を確認してください');
        }
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
                return redirect()->route('todo.index')->with('message', 'タスクを更新しました');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', '更新できませんでした 入力内容を確認してください');
        }
    }

    public function softDeletes($id)
    {
        $todolists = Todolist::find($id);
        if(Auth::id() != $todolists->user_id) {
            return redirect()->route('todo.login');
        } else {
            Todolist::find($id)->delete();
            return redirect()->route('todo.index')->with('message', 'タスクを削除しました');
        }
    }
}
