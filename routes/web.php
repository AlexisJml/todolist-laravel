<?php

use App\Http\Controllers\ToDoListController;
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


Route::prefix('/todolist')->name('todolist.')->controller(ToDoListController::class)->group(function (){
    Route::get('/', 'Get_Tasks')->name('index');
    Route::post('/add-task', 'Add_Task')->name('addTask');
    Route::delete('/delete-task/{id}', 'Delete_Task')->name('deleteTask');

        //modifie une todo
        //récupère la todo en fonction de l'id
        // $todolist = \App\Models\ToDoList::find(1);
        // //modifier ce que l'on souhaite
        // $todolist->titre = "new titre";
        // $todolist->save();
});