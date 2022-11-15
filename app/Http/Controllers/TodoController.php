<?php

namespace App\Http\Controllers;
use App\Models\Todolist;
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
        //
    }

    public function show($id)
    {
        //
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
