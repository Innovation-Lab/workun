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
        Schema::create('self_check_ratings', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('セルフチェック評価ID');
            $table->foreignId('self_check_sheet_id')->comment('セルフチェックシートID')->constrained()->index('self_check_ratings_for_foreign');
            $table->foreignId('user_id')->comment('従業員ID')->constrained();
            $table->unsignedInteger('answer')->comment('回答')->default(0);
            $table->unsignedInteger('rating')->comment('評価')->default(0);
            $table->unsignedTinyInteger('status')->comment('ステータス（1:未回答、2:回答中、3:評価中、4:承認中、5:承認済み）');
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null);
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_check_sheet_ratings');
    }
};
