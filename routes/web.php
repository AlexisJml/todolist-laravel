<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return \route('todolist.index');
});


Route::prefix('/todolist')->name('todolist.')->group(function (){
    Route::get('/', [\App\Http\Controllers\ToDoListController::class, 'Get_Tasks'])->name('index');

        //créer une nouvelle todo ou \App\Models\ToDoList::Create([**val**])
        // $todolist = new \App\Models\ToDoList();
        // $todolist->titre = "deuxième ToDo";
        // $todolist->contenu = "faire le todolist";
        // $todolist->priorité = "faible";
        // $todolist->validé = false;
        // $todolist->save();

        //modifie une todo
        //récupère la todo en fonction de l'id
        // $todolist = \App\Models\ToDoList::find(1);
        // //modifier ce que l'on souhaite
        // $todolist->titre = "new titre";
        // $todolist->save();
    
        // return \App\Models\ToDoList::all();

        // return 'Emplacement ToDoList';
});