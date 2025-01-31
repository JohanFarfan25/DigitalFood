<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('product_id');
            $table->date('production_date');
            $table->date('expiration_date');
            $table->integer('total_quantity');
            $table->string('location', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('registered_by');
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('registered_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('batches');
    }
};
