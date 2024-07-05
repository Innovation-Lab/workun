<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class self_check_sheet_item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'self_check_sheet_id',
        'parent_self_check_sheet_item_id',
        'title',
        'hierarchy',
        'movie_title',
        'movie_url',
    ];
}
