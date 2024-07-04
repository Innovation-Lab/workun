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
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('等級ID');
            $table->foreignId('organization_id')->comment('組織ID')->constrained();
            $table->string('name')->comment('名称')->nullable()->default(null);
            $table->foreignId('position_id')->comment('親役職ID')->constrained();
            $table->unsignedInteger('seq')->comment('順序')->nullable()->default(null);
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
        Schema::dropIfExists('grades');
    }
};
