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
        Schema::create('self_check_sheet_targets', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('セルフチェックシート対象者ID');
            $table->foreignId('self_check_sheet_id')->comment('セルフチェックシートID')->constrained()->index('self_check_sheet_targets_for_foreign');
            $table->foreignId('user_id')->comment('従業員ID')->constrained();
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null);
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_check_sheet_targets');
    }
};
