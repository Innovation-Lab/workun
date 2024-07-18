<?php

namespace App\Repositories;

use App\Models\Period;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PeriodRepository implements PeriodRepositoryInterface
{
    /**
     * @param Request $request
     * @return Builder $query
     */
    public function search(Request $request): Builder
    {
        return Period::query()
            ->keyword($request->get('keyword'));
    }

    /**
     * @param Request $request
     * @return Period
     * @throws Exception
     */
    public function create(Request $request): Period
    {
        $period = new Period();
        $period->fill($request->all());
        if (!$period->save()) {
            throw new Exception("評価期間の作成に失敗しました。");
        }
        return $period;
    }

    /**
     * @param Period $period
     * @param Request $request
     * @return Period
     * @throws Exception
     */
    public function update(Period $period, Request $request): Period
    {
        $period = $period->fill($request->all());
        if (!$period->update()) {
            throw new Exception("評価期間の更新に失敗しました。");
        }
        return $period;
    }
}
