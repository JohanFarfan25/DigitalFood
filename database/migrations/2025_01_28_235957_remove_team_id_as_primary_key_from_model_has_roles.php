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
        Schema::table('model_has_roles', function (Blueprint $table) {
            // Eliminar la restricción de clave primaria sobre team_id
            $table->dropPrimary('team_id');  // Esto elimina la clave primaria si está definida

            // También puedes volver a definir la columna como no nullable si es necesario
            $table->unsignedBigInteger('team_id')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            // Volver a establecer team_id como clave primaria en caso de reversión
            $table->primary('team_id');
        });
    }
};
