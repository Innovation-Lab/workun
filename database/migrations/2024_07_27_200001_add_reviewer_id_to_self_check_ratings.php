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
            $table->unsignedBigInteger('reviewer_id')->nullable()->comment('評価者社員ID')->after('user_id');
            $table->foreign('reviewer_id')->references('id')->on('users');
            $table->unsignedBigInteger('approver_id')->nullable()->comment('承認者社員ID')->after('reviewer_id');
            $table->foreign('approver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('self_check_ratings', function (Blueprint $table) {
            $table->dropForeign(['reviewer_id']);
            $table->dropColumn('reviewer_id');
            $table->dropForeign(['approver_id']);
            $table->dropColumn('approver_id');
        });
    }
};
