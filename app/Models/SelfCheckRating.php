<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'reviewer_id',
        'approver_id',
        'answer',
        'rating',
        'status',
        'remand_reason',
        'remand_flag',
        'rating_remand_reason',
        'rating_remand_flag',
        'answered_at',
        'reviewed_at',
        'approved_at'
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
        self::STATUS_APPROVED => '評価確定',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function self_check_sheet(): BelongsTo
    {
        return $this->belongsTo(SelfCheckSheet::class);
    }

    public function self_check_rating_details()
    {
        return $this->hasMany(SelfCheckRatingDetail::class);
    }

    protected function getStatusLabelAttribute()
    {
        return data_get(self::STATUS_LIST, $this->status);
    }

    protected function getDisplayAnsweredAttribute()
    {
        return $this->answered_at ? date('Y/m/d', strtotime($this->answered_at)) : null;
    }

    protected function getDisplayReviewedAttribute()
    {
        return $this->reviewed_at ? date('Y/m/d', strtotime($this->reviewed_at)) : null;
    }

    protected function getDisplayApprovedAttribute()
    {
        return $this->approved_at ? date('Y/m/d', strtotime($this->approved_at)) : null;
    }

    protected function getAnswerStatusAttribute()
    {
        return in_array($this->status, [
            self::STATUS_NOT_ANSWERED,
            self::STATUS_ANSWERING
        ]);
    }

    protected function scopeOnTerm($query, $term)
    {
        return $query->where('self_check_ratings.target', $term);
    }

    protected function scopeReviewer($query, $user_id)
    {
        return $query->where('self_check_ratings.reviewer_id', $user_id);
    }

    protected function scopeApprover($query, $user_id)
    {
        return $query->where('self_check_ratings.approver_id', $user_id);
    }
}
