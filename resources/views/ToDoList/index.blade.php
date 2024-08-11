@extends('base')

@section('titre', 'Accueil de la ToDoList')

@section('content')
    <H1> Liste des tâches</H1>
    <table>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Contenu</td>
            <td>priorité</td>
            <td>Validé</td>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->titre }}</td>
                <td>{{ $task->contenu }}</td>
                <td>{{ $task->priorité }}</td>
                <td>{{ $task->validé }}</td>
            </tr>
        @endforeach
    </table>
@endsection