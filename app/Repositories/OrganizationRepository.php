<?php

namespace App\Repositories;

use App\Models\Organization;
use Illuminate\Http\Request;
use Exception;

class OrganizationRepository implements OrganizationRepositoryInterface
{
    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Relations\HasMany $query
     */
    public function search(Request $request)
    {
        $organization = Organization::where('access_code', $request->access_code)
            ->where('access_key', $request->access_key)
            ->first();
        return $organization;
    }

    /**
     * @param Request $request
     * @param Organization $organization
     * @return Organization
     * @throws Exception
     */
    public function create(Request $request)
    {
        $organization = new Organization();
        $organization->fill($request->all());
        if (!$organization->save()) {
            throw new Exception("組織の作成に失敗しました。");
        }
        return $organization;
    }

    /**
     * @param $organization
     * @param Request $request
     * @return Organization
     * @throws Exception
     */
    public function update(Organization $organization, Request $request)
    {
        $organization = $organization->fill($request->all());
        if (!$organization->update()) {
            throw new Exception("組織情報の更新に失敗しました。");
        }
        return $organization;
    }
}
