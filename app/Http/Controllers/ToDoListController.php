<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Log;

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

    public function Delete_Task (Int $id) {
        $task = ToDoList::find($id);

        if ($task) {
            $task->delete();
            //Rafraichi la page
            return redirect()->back()->with('delete', 'Tâche supprimée avec succès!');
        } else {
            //Rafraichi la page
            return redirect()->back()->with('error', 'Tâche non trouvée!');
        }
    }

    public function Modify_Task (Request $request, Int $id) {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'priorité' => 'required|in:faible,moyenne,haute',
        ]);

        $task = ToDoList::find($id);
        if ($task) {
            $task->update($validatedData);
            return redirect()->back()->with('modify', 'Tâche modifiée avec succès!');
        } else {
            return redirect()->back()->with('error', 'Tâche non trouvée!');
        }
    }

    public function Validate_Task (Int $id) {
        $task = ToDoList::find($id);
        if ($task) {
            $task->validé = true;
            $task->save();
            return redirect()->back()->with('validate', 'Tâche validé avec succès!');
        } else {
            return redirect()->back()->with('error', 'Tâche non trouvée!');
        }
    }
}
