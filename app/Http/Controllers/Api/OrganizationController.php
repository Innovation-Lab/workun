<?php

namespace App\Http\Controllers\Api;

use App\Models\Organization;
use App\Repositories\OrganizationRepositoryInterface;
use Exception;
use Hash;
use Illuminate\Http\Request;

class OrganizationController extends ApiController
{
    private OrganizationRepositoryInterface $organization_repository;

    /**
     * @param OrganizationRepositoryInterface $organization_repository
     */
    public function __construct(
        OrganizationRepositoryInterface $organization_repository
    )
    {
        parent::__construct();
        $this->organization_repository = $organization_repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // 組織認証
            $organization = $this->getOrganization($request);
        } catch (Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 404);
        }
        return response()->json([
            'organization' => $organization
        ]);
    }

    /**
     * Create the specified resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // 登録処理
            $organization = $this->organization_repository->create($request);
        } catch (Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 200);
        }
        return response()->json([
            'success' => '組織を登録できました。',
            'organization' => $organization
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            // 組織認証
            $organization = $this->getOrganization($request);
            // 更新処理
            $organization = $this->organization_repository->update($organization, $request);
        } catch (Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 200);
        }
        return response()->json([
            'success' => '組織情報を更新しました。',
            'organization' => $organization
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
}
