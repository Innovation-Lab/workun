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
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('組織ID');
            $table->unsignedBigInteger('organization_code')->comment('組織コード（ポータルの組織ID）');
            $table->string('name')->comment('名称')->nullable()->default(null);
            $table->unsignedTinyInteger('portal_management_flg')->comment('ポータル管理者フラグ')->nullable()->default(null);
            $table->string('access_code')->comment('アクセスコード')->unique();
            $table->text('access_key')->comment('アクセスキー')->nullable();
            $table->string('img')->comment('画像')->nullable()->default(null);
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null);
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
