<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ImageTrait;

    protected $fillable = [
        'login_code',
        'keycode',
        'password',
        'nice_name',
        'email',
        'sei',
        'mei',
        'kana_sei',
        'kana_mei',
        'organization_id',
        'birth',
        'joined',
        'img_path',
        'status',
        'number',
        'number_flg',
        'description',
        'position_id',
        'grade_id',
        'salary_id',
        'employment_id',
        'role',
        'memo',
    ];

    protected $casts = [
        'keycode' => 'hashed',
    ];

    /** ステータス */
    const STATUS_TEMPORARY = 1;
    const STATUS_ACTIVATED = 2;
    const STATUS_FREEZED = 3;
    const STATUS_LEAVED = 4;
    const STATUS_LIST = [
        self::STATUS_TEMPORARY => '仮登録',
        self::STATUS_ACTIVATED => '本登録',
        self::STATUS_FREEZED => '停止',
        self::STATUS_LEAVED => '退会',
    ];

    public function departments()
    {
        return $this->hasManyThrough(
            Department::class,
            UserDepartment::class,
            'user_id',
            'id',
            null,
            'department_id'
        );
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function employment()
    {
        return $this->belongsTo(Employment::class);
    }

    protected function getAnswerSelfCheckSheetsAttribute()
    {
        return SelfCheckSheet::query()
            ->select('self_check_sheets.*')
            ->leftJoin('periods', 'periods.id', 'self_check_sheets.period_id')
            ->leftJoin('self_check_sheet_targets', 'self_check_sheet_targets.self_check_sheet_id', 'self_check_sheets.id')
            ->where('self_check_sheet_targets.user_id', $this->id);
    }

    protected function getRatingSelfCheckSheetsAttribute()
    {
        // todo:条件未作成
        return SelfCheckSheet::query()
            ->select('self_check_sheets.*')
            ->leftJoin('periods', 'periods.id', 'self_check_sheets.period_id')
            ->leftJoin('self_check_sheet_targets', 'self_check_sheet_targets.self_check_sheet_id', 'self_check_sheets.id')
            ->where('self_check_sheet_targets.user_id', $this->id);
    }

    protected function getAvatarUrlAttribute()
    {
        if (!$this->img_path) {
            return asset('img/common/noImage/noimage--square.svg');
        } else {
            return $this->getImageUrl($this->img_path);
        }
    }

    protected function getFullNameAttribute()
    {
        return "{$this->sei} {$this->mei}";
    }

    protected function getDepartmentLabelAttribute()
    {
        return implode("、", $this->departments->pluck('name')->toArray());
    }

    protected function getPositionLabelAttribute()
    {
        return data_get($this, 'position.name');
    }

    protected function getGradeLabelAttribute()
    {
        return data_get($this, 'grade.name');
    }

    protected function getSalaryLabelAttribute()
    {
        return data_get($this, 'salary.name');
    }

    protected function getEmploymentLabelAttribute()
    {
        return data_get($this, 'employment.name');
    }

    protected function getDisplayJoinedAttribute()
    {
        return $this->joined ? date('Y.m.d', strtotime($this->joined)) : null;
    }

    protected function getDisplayCreatedAttribute()
    {
        return $this->created_at ? date('Y.m.d', strtotime($this->created_at)) : null;
    }
}

