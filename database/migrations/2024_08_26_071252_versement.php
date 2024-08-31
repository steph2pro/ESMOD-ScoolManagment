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
        Schema::create('versements', function (Blueprint $table) {
            $table->id();
            $table->integer('montant');
            $table->string('objet_paiement'); // Ajout de l'objet du paiement
            $table->string('mode_paiement'); // Ajout du mode de paiement
            $table->string('date_paiement'); // Ajout de la date de paiement
            $table->timestamps();
            $table->foreignId('etudiant_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versements');
    }
};
