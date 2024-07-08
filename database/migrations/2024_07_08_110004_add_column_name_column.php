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
        Schema::table('periods', function (Blueprint $table) {
            $table->string('name')->comment('名称')->nullable()->default(null)->after('organization_id');
            $table->string('start', 10)->comment('評価開始年月（YYYY-MM）')->after('name');
            $table->string('end', 10)->comment('評価終了年月（YYYY-MM）')->after('start');
            $table->dropColumn('year');
            $table->dropColumn('month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('periods', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('start');
            $table->dropColumn('end');
            $table->unsignedInteger('year')->comment('１期目事業年度');
            $table->unsignedInteger('month')->comment('評価開始月');
        });
    }
};
