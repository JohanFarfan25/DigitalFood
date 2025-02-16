<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id');
            $table->integer('customer_id')->nullable();
            $table->string('name', 255);
            $table->string('address', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('registered_by');
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('registered_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
