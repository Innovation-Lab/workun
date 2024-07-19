<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\Grade;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GradeRepository implements gradeRepositoryInterface
{
    /**
     * @param Request $request
     * @param Organization $organization
     * @return Grade
     * @throws Exception
     */
    public function create(Request $request): Grade
    {
        $grade = new Grade();
        $grade->fill($request->all());
        $grade->seq = Grade::max('seq') + 1;
        if (!$grade->save()) {
            throw new Exception("等級の作成に失敗しました。");
        }
        return $grade;
    }

    /**
     * @param Grade $grade
     * @param Request $request
     * @return grade
     * @throws Exception
     */
    public function update(Grade $grade, Request $request): Grade
    {
        $grade->fill($request->all());
        if (!$grade->update()) {
            throw new Exception("等級情報の更新に失敗しました。");
        }
        return $grade;
    }

    /**
     * @param Grade $period
     * @return void
     * @throws Exception
     */
    public function delete(Grade $grade): void
    {
        if (!$grade->delete()) {
            throw new Exception("等級の更新に失敗しました。");
        }
    }


}
