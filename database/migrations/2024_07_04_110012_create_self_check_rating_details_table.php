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
        Schema::create('self_check_rating_details', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('セルフチェック評価詳細ID');
            $table->foreignId('self_check_rating_id')->comment('セルフチェック評価ID')->constrained()->index('self_check_rating_details_for_foreign');
            $table->foreignId('self_check_sheet_item_id')->comment('セルフチェックシート項目ID')->constrained()->index('check_sheet_item_for_rating_details_foreign');
            $table->unsignedInteger('answer')->comment('自己評価')->default(0);
            $table->unsignedInteger('rating')->comment('評価')->default(0);
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null);
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_check_rating_details');
    }
};
