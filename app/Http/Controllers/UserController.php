<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function create(Request $request)
    {
        return view('user.create');
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
            return redirect()->route('user.index');
        } catch (\Exception $e) {
        DB::rollBack();
        }
        return back()->withErrors([
            'error',
        ]);

            //画像フォームでリクエストした画像を取得
            // $img = $request->file('my_photo');

            // //storage > public > img配下に画像が保存される
            // $path = $img->store('img','public');
            // if (isset($img)) {
            //     // 選択された画像ファイルを保存してパスをセット
            //     $path = $img->store('img','public');
            // }
            // try {
            //     DB::beginTransaction();
            //         $users->name  =  $request->name;
            //         $users->gender  =  $request->gender;
            //         $users->birthday  =  $request->birthday;
            //         $users->save();
            //         DB::commit();
            //         return redirect()->route('user.index');
            // } catch (\Exception $e) {
            //     DB::rollBack();
            // }
            // return back()->withErrors([
            //     'error',
            // ]);
    }

}
