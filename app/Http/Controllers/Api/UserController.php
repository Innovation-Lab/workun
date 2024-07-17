<?php

namespace App\Http\Controllers\Api;

use App\Models\Organization;
use App\Models\User;
use App\Repositories\OrganizationRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Hash;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(
        private OrganizationRepositoryInterface $organization_repository,
        private UserRepositoryInterface $user_repository
    )
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // 組織認証
            $organization = $this->getOrganization($request);
            // ユーザー認証
            $user = $this->getUser($request);
        } catch (Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 404);
        }
        return response()->json([
            'success' => true,
            'user_id' => $user ? $user->id : "",
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function sync(Request $request)
    {
        try {
            // 組織認証
            $organization = $this->getOrganization($request);
            // ユーザー認証
            $user = $this->getUser($request);
            // ユーザー処理
            $user = $this->user_repository->sync($organization, $user, $request);
        } catch (Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 200);
        }
        return response()->json([
            'success' => true,
        ], 201);
    }

    /**
     * @param $request
     * @return Organization
     * @throws Exception
     */
    private function getOrganization ($request): Organization
    {
        // アクセスコード
        $access_code = $request->get('access_code');
        $access_key = $request->get('access_key');

        // 必須項目
        if (!(
            $access_code &&
            $access_key
        )) {
            throw new Exception('必須項目が不足しています。');
        }

        // 組織検索
        $organization = $this->organization_repository
            ->search(new Request(['access_code' => $access_code]))
            ->first();
        if (!$organization) {
            throw new Exception('組織が見つかりませんでした。');
        }

        // 組織認証
        if(!Hash::check($access_key, $organization['access_key'])) {
            throw new Exception('組織認証に失敗しました。');
        }

        return $organization;
    }

    /**
     * @param $request
     * @return User|null
     * @throws Exception
     */
    private function getUser ($request): User|null
    {
        // アクセスコード
        $login_code = $request->get('login_code');
        $keycode = $request->get('keycode');

        // 必須項目
        if (!(
            $login_code &&
            $keycode
        )) {
            throw new Exception('必須項目が不足しています。');
        }

        // ユーザー検索
        $user = $this->user_repository
            ->search(new Request(['login_code' => $login_code]))
            ->first();

        if ($user) {
            // ユーザー認証
            if(!Hash::check($keycode, $user['keycode'])) {
                throw new Exception('ユーザー認証に失敗しました。');
            }
        }

        return $user;
    }
}
