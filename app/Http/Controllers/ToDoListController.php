<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;

class ToDoListController extends Controller
{
    public function Get_Tasks () {
        return view('ToDoList.index', [
            'tasks' => ToDoList::where('validé', false)->get(),
            'completed' => ToDoList::where('validé', true)->get()
        ]);
    }

    public function Add_Task (Request $request) {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'priorité' => 'required|in:faible,moyenne,haute',
        ]);

        //Création d'une nouvelle tâche
        $task = new ToDoList();
        $task->titre = $validatedData['titre'];
        $task->contenu = $validatedData['contenu'];
        $task->priorité = $validatedData['priorité'];
        $task->validé = false;
        $task->save(); 

        //Rafraichi la page
        return redirect()->back()->with('success', 'Tâche ajoutée avec succès!');
    }
}
