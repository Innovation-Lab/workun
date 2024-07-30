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
            $table->text('rating_remand_reason')->comment('評価差し戻し理由')->nullable()->default(null)->after('remand_flag');
            $table->tinyInteger('rating_remand_flag')->unsigned()->comment('評価差し戻しフラグ')->nullable()->default(null)->after('rating_remand_reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('self_check_ratings', function (Blueprint $table) {
            $table->dropColumn('rating_remand_reason');
            $table->dropColumn('rating_remand_flag');
        });
    }
};
