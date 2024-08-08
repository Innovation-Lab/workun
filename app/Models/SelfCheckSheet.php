<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SelfCheckSheet extends Model
{
    use HasFactory, SoftDeletes;

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
        'user_id',
    ];

    const HIERARCHY_SINGLE = 1;
    const HIERARCHY_TWICE = 2;
    const HIERARCHY_TRIPLE = 3;
    const HIERARCHY_LIST = [
        self::HIERARCHY_TRIPLE => '3階層',
        self::HIERARCHY_TWICE => '2階層',
        self::HIERARCHY_SINGLE => '1階層',
    ];

    const METHOD_TRUE_FALSE = 1;
    const METHOD_FIVE_GRADE = 2;
    const METHOD_LIST = [
        self::METHOD_TRUE_FALSE => '○×評価',
        self::METHOD_FIVE_GRADE => '5点評価',
    ];

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    public function self_check_sheet_targets(): HasMany
    {
        return $this->hasMany(SelfCheckSheetTarget::class);
    }

    public function self_check_ratings(): HasMany
    {
        return $this->hasMany(SelfCheckRating::class);
    }

    public function self_check_sheet_items(): HasMany
    {
        return $this->hasMany(SelfCheckSheetItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getStickyClass(
        $baseClass,
        $firstTitle,
        $secondTitle = null
    )
    {
        $offset = 0;
        if($this->hierarchy !== self::HIERARCHY_TRIPLE) {
            if (is_null($firstTitle)) $offset++;
            if (is_null($secondTitle)) $offset++;
        }
        return "sticky_" . $baseClass - $offset;
    }

    protected function getDisplayTitleAttribute()
    {
        return data_get($this, 'period.name') . " | " . $this->title;
    }

    protected function getMethodLabelAttribute()
    {
        return data_get(self::METHOD_LIST, $this->method);
    }

    protected function getPeriodNameAttribute()
    {
        return data_get($this, 'period.name');
    }

    protected function getDisplayCreatedAttribute()
    {
        return date('Y.m.d', strtotime($this->created_at));
    }

    protected function getHierarchyLabelAttribute()
    {
        return data_get(self::HIERARCHY_LIST, $this->hierarchy);
    }

    public function getFirstSelfCheckSheetItemsAttribute()
    {
        return $this
            ->self_check_sheet_items()
            ->firstHierarchy()
            ->orderBy('self_check_sheet_items.id')
            ->get();
    }

    protected function getUserFullNameAttribute()
    {
        return data_get($this, 'user.full_name');
    }

    protected function getDisplayPeriodAttribute()
    {
        $start = data_get($this, 'period.start');
        $end = data_get($this, 'period.end');
        return date('Y.m', strtotime("{$start}-01")) . " ~ " . date('Y.m', strtotime("{$end}-01"));
    }

    public function self_check_rating($user, $term)
    {
        return $this
            ->self_check_ratings()
            ->where('self_check_ratings.user_id', $user->id)
            ->onTerm($term)
            ->first();
    }

    protected function scopeOrganization ($query, $organization_id)
    {
        return $query->where('self_check_sheets.organization_id', $organization_id);
    }

    protected function scopeKeyword ($query, $keyword = null)
    {
        if ($keyword) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');
            // 単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            $query->where(function ($q) use ($wordArraySearched) {
                foreach ($wordArraySearched as $word) {
                    $q->where('self_check_sheets.title', 'LIKE', "%{$word}%");
                }
            });
        }
        return $query;
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
