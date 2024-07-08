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
        Schema::dropIfExists('departments');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('部署ID');
            $table->foreignId('organization_id')->comment('組織ID')->constrained();
            $table->foreignId('department_id')->comment('親部署ID')->nullable()->default(null)->constrained();
            $table->string('name')->comment('名称')->nullable()->default(null);
            $table->unsignedInteger('seq')->comment('順序')->nullable()->default(null);
            $table->timestamp('deleted_at')->comment('削除日時')->nullable()->default(null);
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null);
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null);
        });
    }
};
