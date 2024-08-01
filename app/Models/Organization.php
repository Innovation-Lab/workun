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

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function periods()
    {
        return $this->hasMany(Period::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected function getValidUsersAttribute()
    {
        return $this->users()->valid()->get();
    }

    protected function getFirstDepartmentsAttribute()
    {
        return $this->departments()
            ->whereNull('departments.department_id')
            ->orderByRaw('departments.seq is null asc')
            ->orderBy('departments.seq')
            ->orderBy('departments.id')
            ->get();
    }

    protected function scopeOrganization($query, $organization_id)
    {
        return $query->where('id', $organization_id);
    }

}
