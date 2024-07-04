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
        Schema::create('self_check_sheets', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('セルフチェックシートID');
            $table->foreignId('organization_id')->comment('組織ID')->constrained();
            $table->string('title')->comment('タイトル')->nullable()->default(null);
            $table->unsignedInteger('year')->comment('評価年');
            $table->unsignedTinyInteger('term')->comment('期間');
            $table->unsignedTinyInteger('method')->comment('評価方法');
            $table->unsignedTinyInteger('notice')->comment('タスク通知');
            $table->unsignedInteger('check_days')->comment('入力期間');
            $table->unsignedInteger('rating_days')->comment('評価期間');
            $table->unsignedInteger('approval_days')->comment('承認期間');
            $table->timestamp('deleted_at')->comment('削除日時')->nullable()->default(null);
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null);
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_check_sheets');
    }
};
