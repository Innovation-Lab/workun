<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_id',
        'department_id',
        'name',
        'seq',
    ];

    protected function scopeOrganization ($query, $organization_id)
    {
        return $query->where('departments.organization_id', $organization_id);
    }

    public function childDepartments()
    {
        return $this->hasMany(Department::class, 'department_id')
            ->orderByRaw('departments.seq is null asc')
            ->orderBy('departments.seq');
    }
}
