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
        //
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom_prenom');
            $table->string('sexe');
            $table->string('email');
            $table->integer('mobile');
            $table->timestamps();
            $table->foreignId('utilisateur_id')->constrained();
            $table->foreignId('campu_id')->constrained();
            $table->foreignId('specialite_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('etudiants');
    }
};
