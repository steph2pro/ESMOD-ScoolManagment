<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password'); // Ajoute le champ role avec une valeur par défaut
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}
