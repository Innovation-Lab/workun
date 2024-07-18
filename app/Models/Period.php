<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Period extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_id',
        'name',
        'start',
        'end',
    ];

    public function self_check_sheets()
    {
        return $this->hasMany(SelfCheckSheet::class);
    }

    protected function getDisplayStartAttribute ()
    {
        return date('Y年m月', strtotime("{$this->start}-01"));
    }

    protected function getDisplayEndAttribute ()
    {
        return date('Y年m月', strtotime("{$this->end}-01"));
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
                    $q->where('periods.name', 'LIKE', "%{$word}%");
                }
            });
        }
        return $query;
    }

    protected function scopeOrganization ($query, $organization_id)
    {
        return $query->where('periods.organization_id', $organization_id);
    }
}
