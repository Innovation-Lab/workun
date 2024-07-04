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
        Schema::create('self_check_sheet_items', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('セルフチェックシート項目ID');
            $table->foreignId('self_check_sheet_id')->comment('セルフチェックシートID')->constrained()->index('self_check_sheet_items_for_foreign');
            $table->unsignedBigInteger('parent_self_check_sheet_item_id')->comment('親項目ID')->nullable()->default(null);
            $table->text('title')->comment('タイトル')->nullable();
            $table->unsignedTinyInteger('hierarchy')->comment('階層（1:大項目、2:中項目、3:小項目）');
            $table->string('movie_title')->comment('動画タイトル')->nullable()->default(null);
            $table->string('movie_url')->comment('動画URL')->nullable()->default(null);
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
        Schema::dropIfExists('self_check_sheet_items');
    }
};
