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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('nation')->nullable();
            $table->unsignedBigInteger('pre_type_id');
            $table->foreign('pre_type_id')->references('id')->on('preparation_types')->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->string('ingredient')->nullable();
            $table->string('uses')->nullable();
            $table->string('user_manual')->nullable();
            $table->string('important_note')->nullable();
            $table->string('preserve')->nullable();
            $table->string('packing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
