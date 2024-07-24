<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\Salary;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SalaryRepository implements SalaryRepositoryInterface
{
    /**
     * @param Request $request
     * @param Organization $organization
     * @return Salary
     * @throws Exception
     */
    public function create(Request $request): Salary
    {
        $salary = new Salary();
        $salary->fill($request->all());
        $salary->seq = Salary::max('seq') + 1;
        if (!$salary->save()) {
            throw new Exception("号俸の作成に失敗しました。");
        }
        return $salary;
    }

    /**
     * @param Salary $Salary
     * @param Request $request
     * @return Salary
     * @throws Exception
     */
    public function update(Salary $salary, Request $request): Salary
    {
        $salary->fill($request->all());
        if (!$salary->update()) {
            throw new Exception("号俸情報の更新に失敗しました。");
        }
        return $salary;
    }

    /**
     * @param Salary $period
     * @return void
     * @throws Exception
     */
    public function delete(Salary $salary): void
    {
        if (!$salary->delete()) {
            throw new Exception("号俸の更新に失敗しました。");
        }
    }


}
