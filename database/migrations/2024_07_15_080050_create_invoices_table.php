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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('address')->nullable();
            $table->decimal('total_amount',12,3);
            $table->unsignedBigInteger('cus_id')->nullable();
            $table->foreign('cus_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('vou_id')->nullable();
            $table->foreign('vou_id')->references('id')->on('vouchers')->onDelete('cascade');
            $table->decimal('price_discount',12,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
