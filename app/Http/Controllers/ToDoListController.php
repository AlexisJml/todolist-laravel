<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function Get_Tasks () {
        return \App\Models\ToDoList::all();
    }
}
