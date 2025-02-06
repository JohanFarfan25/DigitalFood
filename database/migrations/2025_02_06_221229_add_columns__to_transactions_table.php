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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('external_ref')->nullable()->after('transaction_status');
            $table->string('fact')->nullable()->after('external_ref');
            $table->string('franchise')->nullable()->after('fact');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('external_ref')->nullable()->after('transaction_status');
            $table->string('fact')->nullable()->after('external_ref');
            $table->string('franchise')->nullable()->after('fact');
        });
    }
};
