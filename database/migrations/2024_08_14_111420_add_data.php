<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insertion de données avec 'validé' à true
        DB::table('to_do_lists')->insert([
            [
                'titre' => 'Tâche 1',
                'contenu' => 'Contenu de la tâche 1',
                'priorité' => 'haute',
                'validé' => true,
            ],
            [
                'titre' => 'Tâche 2',
                'contenu' => 'Contenu de la tâche 2',
                'priorité' => 'moyenne',
                'validé' => true,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
