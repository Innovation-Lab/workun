<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\Employment;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EmploymentRepository implements EmploymentRepositoryInterface
{
    /**
     * @param Request $request
     * @param Organization $organization
     * @return Employment
     * @throws Exception
     */
    public function create(Request $request): Employment
    {
        $employment = new Employment();
        $employment->fill($request->all());
        $employment->seq = Employment::max('seq') + 1;
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


}
