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
        Schema::create('periods', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('対象期間管理ID');
            $table->foreignId('organization_id')->comment('組織ID')->constrained();
            $table->unsignedInteger('year')->comment('１期目事業年度');
            $table->unsignedInteger('month')->comment('評価開始月');
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
        Schema::dropIfExists('periods');
    }
};
