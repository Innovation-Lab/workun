<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param Request $request
     * @return Builder $query
     */
    public function search(Request $request): Builder
    {
        $query = User::query();
        $keyword = $request->get('keyword');

        if ($keyword) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');
            // 単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            $query->where(function ($q) use ($wordArraySearched) {
                foreach ($wordArraySearched as $word) {
                    $q->where('nice_name', 'LIKE', "%{$word}%")
                        ->orWhere('sei', 'LIKE', "%{$word}%")
                        ->orWhere('mei', 'LIKE', "%{$word}%")
                        ->orWhere('kana_sei', 'LIKE', "%{$word}%")
                        ->orWhere('kana_mei', 'LIKE', "%{$word}%");
                }
            });
        }

        if ($request->get('login_code')) {
            $query->where('users.login_code', $request->get('login_code'));
        }

        if ($request->get('department_id')) {
            $query->join('user_departments', 'users.id', '=', 'user_departments.user_id')
                ->where('user_departments.department_id', $request->get('department_id'));
        }

        if ($request->get('position_id')) {
            $query->where('users.position_id', $request->get('position_id'));
        }

        if ($request->get('grade_id')) {
            $query->where('users.grade_id', $request->get('grade_id'));
        }

        if ($request->get('employment_id')) {
            $query->where('users.employment_id', $request->get('employment_id'));
        }

        return $query;
    }

    /**
     * @param User $user
     * @param Request $request
     * @throws Exception
     * @return User $user
     */
    public function update(User $user, Request $request): User
    {
        $attributes = $this->makeAttributes($request);
        $user = $user->fill($attributes);
        if (!$user->save()) {
            throw new Exception("ユーザーの更新に失敗しました。");
        }

        return $user;
    }

    /**
     * @param Request $request
     * @return array
     */
    private function makeAttributes (Request $request): array
    {
        $attributes = $request->all();

        return $attributes;
    }

    /**
     * @param Organization $organization
     * @param $user
     * @param Request $request
     * @return Builder $query
     * @throws Exception
     */
    public function sync(
        Organization $organization,
        $user,
        Request $request
    )
    {
        if (!$user) {
            $user = new User($request->only([
                'login_code',
                'keycode',
            ]));
            $user->organization_id = $organization->id;
        }
        $user->fill($request->get('data'));
        $user->status = $request->get('active') == 1 ? User::STATUS_ACTIVATED : User::STATUS_FREEZED;
        if (!$user->save()) {
            throw new Exception();
        }
        return $user;
    }
}
