<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfCheckRating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'self_check_sheet_id',
        'target',
        'user_id',
        'answer',
        'rating',
        'status',
    ];

    /** ステータス */
    const STATUS_NOT_ANSWERED = 1;
    const STATUS_ANSWERING = 2;
    const STATUS_RATING = 3;
    const STATUS_APPROVING = 4;
    const STATUS_APPROVED = 5;
    const STATUS_LIST = [
        self::STATUS_NOT_ANSWERED => '未回答',
        self::STATUS_ANSWERING => '回答中',
        self::STATUS_RATING => '評価中',
        self::STATUS_APPROVING => '承認中',
        self::STATUS_APPROVED => '承認済み',
    ];

    protected function scopeOnTerm($query, $term)
    {
        return $query->where('self_check_ratings.target', $term);
    }

    protected function getStatusLabelAttribute()
    {
        return data_get(self::STATUS_LIST, $this->status);
    }
}
