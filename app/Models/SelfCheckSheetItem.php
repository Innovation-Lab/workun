<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfCheckSheetItem extends Model
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

    const HIERARCHY_FIRST = 1;
    const HIERARCHY_SECOND = 2;
    const HIERARCHY_THIRD = 3;
    const HIERARCHY_LIST = [
        self::HIERARCHY_FIRST => '1階層',
        self::HIERARCHY_SECOND => '2階層',
        self::HIERARCHY_THIRD => '3階層',
    ];

    public function self_check_sheet_items()
    {
        return $this->hasMany(SelfCheckSheetItem::class, 'parent_self_check_sheet_item_id', 'id');
    }

    protected function getSecondSelfCheckSheetItemsAttribute()
    {
        return $this
            ->self_check_sheet_items()
            ->secondHierarchy()
            ->orderBy('self_check_sheet_items.id')
            ->get();
    }

    protected function getThirdSelfCheckSheetItemsAttribute()
    {
        return $this
            ->self_check_sheet_items()
            ->thirdHierarchy()
            ->orderBy('self_check_sheet_items.id')
            ->get();
    }

    protected function getRowspanAttribute()
    {
        $rowspan = 0;
        switch ($this->hierarchy) {
            case self::HIERARCHY_FIRST:
                $rowspan = $this
                    ->second_self_check_sheet_items
                    ->sum(function ($second_self_check_sheet_item) {
                        return $second_self_check_sheet_item
                            ->third_self_check_sheet_items
                            ->count();
                    });
                break;
            case self::HIERARCHY_SECOND:
                $rowspan = $this
                    ->third_self_check_sheet_items
                    ->count();
                break;
            case self::HIERARCHY_THIRD:
                $rowspan = 1;
                break;
        }
        return $rowspan;
    }

    protected function scopeFirstHierarchy($query)
    {
        return $query->where('self_check_sheet_items.hierarchy', self::HIERARCHY_FIRST);
    }

    protected function scopeSecondHierarchy($query)
    {
        return $query->where('self_check_sheet_items.hierarchy', self::HIERARCHY_SECOND);
    }

    protected function scopeThirdHierarchy($query)
    {
        return $query->where('self_check_sheet_items.hierarchy', self::HIERARCHY_THIRD);
    }
}
