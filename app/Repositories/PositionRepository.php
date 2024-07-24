<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\Position;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PositionRepository implements PositionRepositoryInterface
{
    /**
     * @param Request $request
     * @param Organization $organization
     * @return Position
     * @throws Exception
     */
    public function create(Request $request): Position
    {
        $position = new Position();
        $position->fill($request->all());
        $position->seq = Position::max('seq') + 1;
        if (!$position->save()) {
            throw new Exception("役職の作成に失敗しました。");
        }
        return $position;
    }

    /**
     * @param Position $position
     * @param Request $request
     * @return Position
     * @throws Exception
     */
    public function update(Position $position, Request $request): Position
    {
        $position->fill($request->all());
        if (!$position->update()) {
            throw new Exception("役職情報の更新に失敗しました。");
        }
        return $position;
    }

    /**
     * @param Position $period
     * @return void
     * @throws Exception
     */
    public function delete(Position $position): void
    {
        if (!$position->delete()) {
            throw new Exception("役職の更新に失敗しました。");
        }
    }


}
