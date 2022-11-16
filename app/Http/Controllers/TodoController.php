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
        return view('index', compact('todolists'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $todo  =  new Todolist();
            $todo->name  =  $request->name;
            $todo->text  =  $request->text;
            $todo->limit_date  =  $request->limit_date;
            $todo->save();
            DB::commit();
            return redirect()->route('todolists');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }

    public function show($id)
    {
        $todolists = Todolist::find($id);
        return view('detail', compact('todolists'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
