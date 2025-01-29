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
            // Cambiar 'team_id' para que tenga el valor por defecto de 1
            $table->unsignedBigInteger('team_id')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            // Restaurar 'team_id' para que no tenga un valor por defecto
            $table->unsignedBigInteger('team_id')->nullable()->change();
        });
    }
};
