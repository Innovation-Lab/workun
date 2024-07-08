<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
}

