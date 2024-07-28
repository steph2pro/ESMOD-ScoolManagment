 <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\DB;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         // Désactiver temporairement les contraintes de clé étrangère
//         DB::statement('SET FOREIGN_KEY_CHECKS=0;');

//         // Supprimer la table
//         Schema::dropIfExists('specialites');

//         // Réactiver les contraintes de clé étrangère
//         DB::statement('SET FOREIGN_KEY_CHECKS=1;');
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::create('specialites', function (Blueprint $table) {
//             $table->id();
//             $table->string('libele');
//             $table->decimal('frais_scolarite', 10, 2);
//             $table->decimal('frais_inscription', 10, 2);
//             $table->timestamps();
//         });
//     }
// };

