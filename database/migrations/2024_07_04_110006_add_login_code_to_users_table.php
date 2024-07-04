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
        Schema::table('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('顧客ID')->change();
            $table->dropColumn('name');
            $table->string('login_code')->comment('ログインID')->unique()->after('id');
            $table->string('password')->comment('パスワード')->nullable()->default(null)->after('login_code');
            $table->string('nice_name')->comment('ニックネーム')->nullable()->default(null)->after('password');
            $table->string('email')->comment('メールアドレス')->nullable()->default(null)->after('nice_name');
            $table->string('sei')->comment('姓')->nullable()->default(null)->after('email');
            $table->string('mei')->comment('名')->nullable()->default(null)->after('sei');
            $table->string('kana_sei')->comment('セイ')->nullable()->default(null)->after('mei');
            $table->string('kana_mei')->comment('メイ')->nullable()->default(null)->after('kana_sei');
            $table->foreignId('organization_id')->comment('組織ID')->nullable()->default(null)->after('kana_mei')->constrained();
            $table->date('birth')->comment('生年月日')->nullable()->default(null)->after('organization_id');
            $table->date('joined')->comment('入社年月日')->nullable()->default(null)->after('birth');
            $table->string('img_path')->comment('ユーザー画像パス')->nullable()->default(null)->after('joined');
            $table->unsignedTinyInteger('status')->comment('ステータス(1:仮登録, 2:本登録, 3:停止, 4:退会)')->nullable()->default(null)->after('img_path');
            $table->string('number')->comment('電話番号')->nullable()->default(null)->after('status');
            $table->unsignedTinyInteger('number_flg')->comment('SMS通知 (1:有効 , 2:無効)')->nullable()->default(null)->after('number');
            $table->text('description')->comment('備考')->nullable()->after('number_flg');
            $table->foreignId('department_id')->comment('部署ID')->nullable()->default(null)->after('description')->constrained();
            $table->foreignId('position_id')->comment('役職ID')->nullable()->default(null)->after('department_id')->constrained();
            $table->foreignId('grade_id')->comment('等級ID')->nullable()->default(null)->after('position_id')->constrained();
            $table->foreignId('employment_id')->comment('雇用形態ID')->nullable()->default(null)->after('grade_id')->constrained();
            $table->unsignedTinyInteger('role')->comment('権限（1:一般、2:マネージャー、9:管理者）')->nullable()->default(null)->after('employment_id');
            $table->text('memo')->comment('メモ')->nullable()->after('role');
            $table->timestamp('created_at')->comment('作成日時')->nullable()->default(null)->change();
            $table->timestamp('updated_at')->comment('更新日時')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->id()->change();
            $table->string('name')->after('id');
            $table->dropColumn('login_code');
            $table->dropColumn('password');
            $table->dropColumn('nice_name');
            $table->dropColumn('email');
            $table->dropColumn('sei');
            $table->dropColumn('mei');
            $table->dropColumn('kana_sei');
            $table->dropColumn('kana_mei');
            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');
            $table->dropColumn('birth');
            $table->dropColumn('joined');
            $table->dropColumn('img_path');
            $table->dropColumn('status');
            $table->dropColumn('number');
            $table->dropColumn('number_flg');
            $table->dropColumn('description');
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
            $table->dropForeign(['position_id']);
            $table->dropColumn('position_id');
            $table->dropForeign(['grade_id']);
            $table->dropColumn('grade_id');
            $table->dropForeign(['employment_id']);
            $table->dropColumn('employment_id');
            $table->dropColumn('role');
            $table->dropColumn('memo');
        });
    }
};
