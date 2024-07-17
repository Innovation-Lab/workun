<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfCheckSheet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_id',
        'hierarchy',
        'title',
        'period_id',
        'method',
        'check_days',
        'rating_days',
        'approval_days',
    ];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function self_check_sheet_targets()
    {
        return $this->hasMany(SelfCheckSheetTarget::class);
    }

    public function self_check_ratings()
    {
        return $this->hasMany(SelfCheckRating::class);
    }


    protected function getDisplayTitleAttribute()
    {
        return data_get($this, 'period.name') . " | " . $this->title;
    }

    protected function scopeOnTerm($query, $term)
    {
        return $query
            ->where(function ($query) use ($term) {
                return $query
                    ->where('periods.start', '<=', $term)
                    ->where('periods.end', '>=', $term);
            });
    }
}
