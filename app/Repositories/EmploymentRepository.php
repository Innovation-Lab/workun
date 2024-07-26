<?php

namespace App\Repositories;

use App\Models\Employment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploymentRepository implements EmploymentRepositoryInterface
{
    /**
     * @param Request $request
     * @return Employment
     * @throws Exception
     */
    public function create(Request $request): Employment
    {
        $attributes = $this->makeAttributes($request);
        $employment = new Employment($attributes);
        if (!$employment->save()) {
            throw new Exception("雇用形態の作成に失敗しました。");
        }

        return $employment;
    }

    /**
     * @param Employment $Employment
     * @param Request $request
     * @return Employment
     * @throws Exception
     */
    public function update(Employment $employment, Request $request): Employment
    {
        $employment->fill($request->all());
        if (!$employment->update()) {
            throw new Exception("雇用形態情報の更新に失敗しました。");
        }

        return $employment;
    }

    /**
     * @param Employment $period
     * @return void
     * @throws Exception
     */
    public function delete(Employment $employment): void
    {
        if (!$employment->delete()) {
            throw new Exception("雇用形態の更新に失敗しました。");
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
        $max_seq = Employment::query()
            ->organization($user->organization_id)
            ->max('seq');

        $attributes = $request->all();
        $attributes['seq'] = $max_seq + 1;

        return $attributes;
    }
}
