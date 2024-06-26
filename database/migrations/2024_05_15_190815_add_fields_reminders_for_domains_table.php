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
        Schema::table('domains', function (Blueprint $table) {
            $table->date('reminder_st')->nullable()->after('expired_datetime');
            $table->date('reminder_nd')->nullable()->after('reminder_st');
            $table->date('reminder_rd')->nullable()->after('reminder_nd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropColumn([
                'reminder_st',
                'reminder_nd',
                'reminder_rd'
            ]);
        });
    }
};
