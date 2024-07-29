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
        Schema::table('self_check_ratings', function (Blueprint $table) {
            $table->text('remand_reason')->comment('差し戻し理由')->nullable()->default(null)->after('status');
            $table->tinyInteger('remand_flag')->unsigned()->comment('差し戻しフラグ')->nullable()->default(null)->after('remand_reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('self_check_ratings', function (Blueprint $table) {
            $table->dropColumn('remand_reason');
            $table->dropColumn('remand_flag');
        });
    }
};
