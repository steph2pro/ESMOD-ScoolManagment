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

        Schema::create('scolarites', function (Blueprint $table) {
            $table->id();
            $table->string('annee_scolaire');
            $table->integer('montant_total');
            $table->integer('montant_paye');
            $table->integer('montant_restant');
            $table->integer('montant_inscription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('scolarites');
    }
};
