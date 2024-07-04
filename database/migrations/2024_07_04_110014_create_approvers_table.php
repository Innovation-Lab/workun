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
        Schema::create('approvers', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('承認者管理ID');
            $table->foreignId('user_id')->comment('被評価者社員ID')->constrained();
            $table->unsignedBigInteger('manager_user_id')->comment('承認者社員ID');
            $table->foreign('manager_user_id')->references('id')->on('users');
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null);
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvers');
    }
};
