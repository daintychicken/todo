<?php

namespace App\Http\Controllers;
use App\Models\Todolist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todolists = Todolist::all();
        return view('todolist.index', compact('todolists'));
    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $todo  =  new Todolist();
            $todo->user_id = 1;
            $todo->name  =  $request->name;
            $todo->text  =  $request->text;
            $todo->limit_date  =  $request->limit_date;
            $todo->save();
            DB::commit();
            return redirect()->route('todolist.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }

    public function show($id)
    {
        $todolists = Todolist::find($id);
        return view('todolist.show', compact('todolists'));
    }

    public function edit($id)
    {
        $todolists = Todolist::find($id);
        return view('todolist.edit', compact('todolists'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $todo = Todolist::find($id);
            $todo->user_id = 1;
            $todo->name  =  $request->name;
            $todo->text  =  $request->text;
            $todo->limit_date  =  $request->limit_date;
            $todo->completion_date  =  $request->completion_date;
            $todo->save();
            DB::commit();
            return redirect()->route('todolist.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }

    public function destroy($id)
    {
        //
    }
}
