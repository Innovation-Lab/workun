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
        Schema::table('self_check_sheets', function (Blueprint $table) {
            $table->unsignedTinyInteger('hierarchy')->comment('階層数（1:1階層、2:2階層、3:3階層）')->after('organization_id');
            $table->foreignId('period_id')->comment('対象期間管理ID')->after('title')->constrained();
            $table->unsignedTinyInteger('method')->comment('評価方法（1:○×評価、2:5点評価）')->change();
            $table->dropColumn('year');
            $table->dropColumn('term');
            $table->dropColumn('notice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('self_check_sheets', function (Blueprint $table) {
            $table->dropColumn('hierarchy');
            $table->dropForeign(['period_id']);
            $table->dropColumn('period_id');
            $table->unsignedTinyInteger('method')->comment('評価方法')->change();
            $table->unsignedInteger('year')->comment('評価年');
            $table->unsignedTinyInteger('term')->comment('期間');
            $table->unsignedTinyInteger('notice')->comment('タスク通知');
        });
    }
};
