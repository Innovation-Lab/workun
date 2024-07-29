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
            $table->timestamp('reviewed_at')->comment('評価日時')->nullable()->default(null)->after('status');
            $table->timestamp('confirmed_at')->comment('承認日時')->nullable()->default(null)->after('reviewed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('self_check_ratings', function (Blueprint $table) {
            $table->dropColumn('reviewed_at');
            $table->dropColumn('confirmed_at');
        });
    }
};
