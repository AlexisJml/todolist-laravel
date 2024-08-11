<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('to_do_list', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('contenu');
            $table->enum('priorité', ['faible', 'moyenne', 'haute']);
            $table->date('date');
            $table->boolean('validé');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_do_list');
    }
};
