<?php

namespace App\Repositories;

use App\Models\Position;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionRepository implements PositionRepositoryInterface
{
    /**
     * @param Request $request
     * @return Position
     * @throws Exception
     */
    public function create(Request $request): Position
    {
        $attributes = $this->makeAttributes($request);
        $position = new Position($attributes);
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

    /**
     * @param Request $request
     * @return array
     *
     * TODO: updateと共通化した時、seqの登録方法を再検討する
     */
    private function makeAttributes (Request $request): array
    {
        $user = Auth::user();
        $max_seq = Position::query()
            ->organization($user->organization_id)
            ->max('seq');

        $attributes = $request->all();
        $attributes['seq'] = $max_seq + 1;

        return $attributes;
    }
}
