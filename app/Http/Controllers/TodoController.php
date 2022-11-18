<?php

namespace App\Http\Controllers;
use App\Models\Todolist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Todolist::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $todolists = $query->get();

        return view('todolist.index', compact('todolists', 'keyword'));

        // $todolists = Todolist::orderBy('limit_date')->get();
        // return view('todolist.index', [
        //     "todolists" => $todolists
        // ]);
    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $todolists  =  new Todolist();
            $todolists->Auth::id();
            $todolists->name  =  $request->name;
            $todolists->text  =  $request->text;
            $todolists->limit_date  =  $request->limit_date;
            $todolists->save();
            DB::commit();
            return redirect('/');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }

    public function show($id)
    {
        $todolists = Todolist::find($id);
        return view('todolist.show', [
            "todolists" => $todolists
        ]);
    }

    public function edit($id)
    {
        $todolists = Todolist::find($id);
        return view('todolist.edit', [
            "todolists" => $todolists
        ]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $todolists = Todolist::find($request->id);
            $todolists->name  =  $request->name;
            $todolists->text  =  $request->text;
            $todolists->limit_date  =  $request->limit_date;
            $todolists->completion_date  =  $request->completion_date;
            $todolists->save();
            DB::commit();
            return redirect('/');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }

    public function softDeletes($id)
    {
        Todolist::find($id)->delete();
        return redirect('/');
    }

}
