@extends('base')

@section('titre', 'Accueil de la ToDoList')

@section('content')
<H1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"> Liste des tâches</H1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-hidden rounded-t-lg">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Titre</th>
                <th scope="col" class="px-6 py-3">Contenu</th>
                <th scope="col" class="px-6 py-3">priorité</th>
                <th scope="col" class="px-6 py-3">Validé</th> <!--le modifier en date de création -->
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            @php
                $modalDelId = 'crud-modal-delete-' . $task->id;
                $modalModId = 'crud-modal-modify-' . $task->id;
                $modalValId = 'crud-modal-validate-' . $task->id;
            @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $task->id }}</td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $task->titre }}</th>
                    <td class="px-6 py-4">{{ $task->contenu }}</td>
                    <td class="px-6 py-4">{{ $task->priorité }}</td>
                    <td class="px-6 py-4">{{ $task->validé }}</td>
                    <td class="flex items-center px-6 py-4">
                        <!-- Bouton d'affichage de la pop-up de suppression -->
                        <button data-modal-target="{{ $modalDelId }}" data-modal-toggle="{{ $modalDelId }}" class="flex justify-center items-center text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5" type="button">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#ff0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z" /></g></svg>
                        </button>
                        <!-- Bouton d'affichage de la pop-up de modification -->
                        <button data-modal-target="{{ $modalModId }}" data-modal-toggle="{{ $modalModId }}" class="flex justify-center items-center text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5" type="button">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(270)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.29185 3.294C3.58094 3.00403 4.0176 2.91959 4.39395 3.08088L10.6939 5.78088L18.3939 9.08088C18.5109 9.131 18.6172 9.20297 18.7071 9.29292L21.7071 12.2929C22.0977 12.6834 22.0977 13.3166 21.7071 13.7071C21.3166 14.0977 20.6834 14.0977 20.2929 13.7071L18.0063 11.4205L11.4839 18.0585L13.7089 20.2947C14.0985 20.6862 14.0969 21.3194 13.7054 21.7089C13.3139 22.0985 12.6807 22.0969 12.2911 21.7054L9.36877 18.7683C9.28036 18.6794 9.20944 18.5747 9.15971 18.4597L5.79793 10.6809L3.08209 4.39674C2.91965 4.02088 3.00276 3.58397 3.29185 3.294ZM10.406 16.302L16.2613 10.3428L10.5284 7.88587L7.90329 10.511L10.406 16.302ZM7.04978 8.53607L8.5485 7.03734L5.91414 5.90833L7.04978 8.53607Z" fill="#1D4ED8"></path></g></svg>
                        </button>
                        <!-- Bouton d'affichage de la pop-up de validation -->
                        <button data-modal-target="{{ $modalValId }}" data-modal-toggle="{{ $modalValId }}" class="flex justify-center items-center text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5" type="button">
                            <svg class="w-5 h-5" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#43A047"><path d="M866.133333 258.133333L362.666667 761.6l-204.8-204.8L98.133333 618.666667 362.666667 881.066667l563.2-563.2z" /></svg>
                        </button>

                        <!-- intérieur de la pop-up de suppression -->
                        <div id="{{ $modalDelId }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Contenu -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Supprimer
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{ $modalDelId }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Body -->
                                    <form class="p-4 md:p-5">
                                        <div class="grid gap-4 mb-4">
                                            <p>Voulez-vous vraiment supprimer cette tâche?</p>
                                        </div>
                                        <div class="flex justify-center space-x-4">
                                            <button type="submit" class="text-blue-700 inline-flex items-center border border-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-600 dark:text-blue-600 dark:hover:bg-blue-700 dark:hover:text-white dark:focus:ring-blue-800">
                                                Annuler
                                            </button>
                                            <button type="submit" class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Supprimer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- intérieur de la pop-up de modification -->
                        <div id="{{ $modalModId }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Contenu -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Modifier
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{ $modalModId }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Body -->
                                    <form class="p-4 md:p-5">
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $task->titre }}" placeholder="Titre de la tâche" required="">
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priorité</label>
                                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="haute" {{ $task->priorité == 'haute' ? 'selected' : '' }}>haute</option>
                                                    <option value="moyenne" {{ $task->priorité == 'moyenne' ? 'selected' : '' }}>moyenne</option>
                                                    <option value="faible" {{ $task->priorité == 'faible' ? 'selected' : '' }}>faible</option>
                                                </select>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="contenu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu</label>
                                                <textarea id="contenu" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here">{{ $task->contenu }}</textarea>                    
                                            </div>
                                        </div>
                                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Modifier la tâche
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- intérieur de la pop-up de validation -->
                        <div id="{{ $modalValId }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Contenu -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Valider
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{ $modalValId }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Body -->
                                    <form class="p-4 md:p-5">
                                        <div class="grid gap-4 mb-4">
                                            <p>Voulez-vous vraiment valider cette tâche?</p>
                                        </div>
                                        <div class="flex justify-center space-x-4">
                                            <button type="submit" class="text-blue-700 inline-flex items-center border border-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-600 dark:text-blue-600 dark:hover:bg-blue-700 dark:hover:text-white dark:focus:ring-blue-800">
                                                Annuler
                                            </button>
                                            <button type="submit" class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                Valider
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
</div>

<H1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"> Liste des tâches completées</H1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-hidden rounded-t-lg">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Titre</th>
                <th scope="col" class="px-6 py-3">Contenu</th>
                <th scope="col" class="px-6 py-3">Valider le</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($completed as $taskcomplete)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $taskcomplete->id }}</td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $taskcomplete->titre }}</th>
                        <td class="px-6 py-4">{{ $taskcomplete->contenu }}</td>
                        <td class="px-6 py-4">{{ $taskcomplete->updated_at }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection