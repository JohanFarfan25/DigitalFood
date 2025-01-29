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
        Schema::table('users', function (Blueprint $table) {
            $table->string('uuid')->after('id');
            $table->boolean('status')->default(true)->after('uuid');
            $table->integer('rol_id')->after('status');
            $table->longText('profile_picture')->nullable()->after('about_me');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('uuid')->after('id');
            $table->boolean('status')->default(true)->after('uuid');
            $table->integer('rol_id')->after('status');
            $table->longText('profile_picture')->nullable()->after('about_me');
        });
    }
};
