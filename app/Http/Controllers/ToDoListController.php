<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function Get_Tasks () {
        return view('ToDoList.index', [
            'tasks' => \App\Models\ToDoList::where('validé', false)->get(),
            'completed' => \App\Models\ToDoList::where('validé', true)->get()
        ]);
    }

    public function Add_Task () {
        
    }
}
