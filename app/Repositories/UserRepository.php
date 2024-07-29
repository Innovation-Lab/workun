<?php

namespace App\Repositories;

use App\Models\Approver;
use App\Models\Organization;
use App\Models\Reviewer;
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

        if ($request->get('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('users.sei', $request->get('name'))
                    ->orWhere('users.mei', $request->get('name'));
            });
        }

        if ($request->get('email')) {
            $query->where('users.email', $request->get('email'));
        }

        if ($request->get('number')) {
            $query->where('users.number', $request->get('number'));
        }

        if ($request->get('organization_id')) {
            $query->where('users.organization_id', $request->get('organization_id'));
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

        if ($request->get('unregistered_reviewer_and_approver')) {
            $query->whereDoesntHave('approvers')
                ->whereDoesntHave('reviewers');
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
        // 承認者を登録
        $this->syncEntities(
            $user,
            $request->get('approvers', []),
            'approvers',
            Approver::class,
            '承認者'
        );

        // 評価者を登録
        $this->syncEntities(
            $user,
            $request->get('reviewers', []),
            'reviewers',
            Reviewer::class,
            '評価者'
        );

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

    private function syncEntities(
        User $user,
        array $selectedEntities,
        string $entity,
        string $entityClass,
        string  $model_name
    ) {
        $currentEntities = $user->$entity;
        for (
            $index = 0;
            $index < max($currentEntities->count(), count($selectedEntities));
            $index++
        ) {
            $currentEntity = data_get($currentEntities, $index);
            $selectedEntity = data_get($selectedEntities, $index);
            if ($currentEntity && $selectedEntity) {
                // 更新
                $currentEntity->user_id = $user->id;
                $currentEntity->manager_user_id = $selectedEntity;
                if (!$currentEntity->save()) {
                    throw new Exception("{$model_name}の登録に失敗しました。");
                }
            } elseif (!$currentEntity && $selectedEntity) {
                // 新規
                $newEntity = new $entityClass();
                $newEntity->user_id = $user->id;
                $newEntity->manager_user_id = $selectedEntity;
                if (!$newEntity->save()) {
                    throw new Exception("{$model_name}の登録に失敗しました。");
                }
            } elseif ($currentEntity && !$selectedEntity) {
                // 削除
                if (!$currentEntity->delete()) {
                    throw new Exception("{$model_name}の登録に失敗しました。");
                }
            }
        }
    }
}
