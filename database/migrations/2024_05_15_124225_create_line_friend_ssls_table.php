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
        Schema::create('line_friend_ssls', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->nullable();
            $table->string('line_token')->comment('LINEで管理しているトークン');
            $table->string('line_name')->nullable()->comment('LINEでの登録名');
            $table->string('line_picture_url')->nullable()->comment('LINEアイコンのURL');
            $table->boolean('is_followed')->default(true)->comment('友達状態');
            $table->dateTime('last_followed_at')->nullable()->comment('最後に友達状態になった日時');
            $table->dateTime('last_unfollowed_at')->nullable()->comment('最後にブロックされた日時');
            $table->dateTime('deleted_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_friend_ssls');
    }
};
