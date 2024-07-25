<?php

namespace App\Repositories;

use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeRepository implements GradeRepositoryInterface
{
    /**
     * @param Request $request
     * @return Grade
     * @throws Exception
     */
    public function create(Request $request): Grade
    {
        $attributes = $this->makeAttributes($request);
        $grade = new Grade($attributes);
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

    /**
     * @param Request $request
     * @return array
     *
     * TODO: updateと共通化した時、seqの登録方法を再検討する
     */
    private function makeAttributes (Request $request): array
    {
        $user = Auth::user();
        $max_seq = Grade::query()
            ->organization($user->organization_id)
            ->max('seq');

        $attributes = $request->all();
        $attributes['seq'] = $max_seq + 1;

        return $attributes;
    }
}
