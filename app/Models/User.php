<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'login_code',
        'password',
        'nice_name',
        'email',
        'sei',
        'mei',
        'kana_sei',
        'kana_mei',
        'organization_id',
        'birth',
        'joined',
        'img_path',
        'status',
        'number',
        'number_flg',
        'description',
        'position_id',
        'grade_id',
        'employment_id',
        'role',
        'memo',
    ];

    protected function getAnswerSelfCheckSheetsAttribute()
    {
        return SelfCheckSheet::query()
            ->select('self_check_sheets.*')
            ->leftJoin('periods', 'periods.id', 'self_check_sheets.period_id')
            ->leftJoin('self_check_sheet_targets', 'self_check_sheet_targets.self_check_sheet_id', 'self_check_sheets.id')
            ->where('self_check_sheet_targets.user_id', $this->id);
    }
}

