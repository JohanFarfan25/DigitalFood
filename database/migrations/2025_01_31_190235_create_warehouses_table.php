<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->string('location', 255)->nullable();
            $table->integer('max_capacity');
            $table->boolean('temperature_controlled');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->unsignedBigInteger('registered_by');
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('registered_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
};
