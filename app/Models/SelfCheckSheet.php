<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class self_check_sheet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_id',
        'title',
        'year',
        'term',
        'method',
        'notice',
        'check_days',
        'rating_days',
        'approval_days',
    ];
}
