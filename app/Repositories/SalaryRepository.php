<?php

namespace App\Repositories;

use App\Models\Salary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryRepository implements SalaryRepositoryInterface
{
    /**
     * @param Request $request
     * @return Salary
     * @throws Exception
     */
    public function create(Request $request): Salary
    {
        $attributes = $this->makeAttributes($request);
        $salary = new Salary($attributes);
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

    /**
     * @param Request $request
     * @return array
     *
     * TODO: updateと共通化した時、seqの登録方法を再検討する
     */
    private function makeAttributes (Request $request): array
    {
        $user = Auth::user();
        $max_seq = Salary::query()
            ->organization($user->organization_id)
            ->max('seq');

        $attributes = $request->all();
        $attributes['seq'] = $max_seq + 1;

        return $attributes;
    }
}
