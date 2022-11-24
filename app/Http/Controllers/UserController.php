<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $items = Item::get();
        $users = User::find(Auth::id());
        return view('user.index', compact('items', 'users'));
    }

    public function create(Request $request)
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        //画像フォームでリクエストした画像を取得
        $img = $request->file('img_path');
        //storage > public > img配下に画像が保存される
        $path = $img->store('img','public');

        Item::create([
            'img_path' => $path,
        ]);
        return view('user.index');
    }

    public function edit($id)
    {
        $users = User::find(Auth::id());
        if(Auth::id() != $users->id) {
            return redirect()->route('todo.login');
        } else {
            return view('user.edit', [
                "users" => $users
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $users = User::find($request->id);
            if(Auth::id() != $users->user_id) {
                return redirect()->route('todo.login');
            } else {
                $users->name  =  $request->name;
                $users->gender  =  $request->gender;
                $users->birthday  =  $request->birthday;
                $users->save();
                DB::commit();
                return redirect()->route('user.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withErrors([
            'error',
        ]);
    }
}
