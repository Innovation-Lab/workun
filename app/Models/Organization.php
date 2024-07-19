<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Organization extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_code',
        'name',
        'portal_management_flg',
        'access_code',
        'access_key',
        'img',
    ];

    protected $casts = [
        'access_key' => 'hashed',
    ];

    protected function scopeOrganization($query, $user_id)
    {
        return $query->join('users', 'organizations.id', '=', 'users.organization_id')
                    ->where('users.id', $user_id);
    }
}
