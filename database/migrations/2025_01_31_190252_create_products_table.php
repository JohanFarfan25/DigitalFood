<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('category', 100)->nullable();
            $table->string('unit_of_measure', 50)->nullable();
            $table->date('expiration_date')->nullable();
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->unsignedBigInteger('supplier_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('registered_by');
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('registered_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
