<?php

namespace App\Repositories;

use App\Models\Organization;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class OrganizationRepository implements OrganizationRepositoryInterface
{
    /**
     * @param Request $request
     * @return HasMany $query
     */
    public function find(Request $request): HasMany
    {
        return Organization::where('access_code', $request->access_code)
            ->where('access_key', $request->access_key)
            ->first();
    }

    /**
     * @param Request $request
     * @return Builder $query
     */
    public function search(Request $request): Builder
    {
        $query = Organization::query();

        if ($request->get('access_code')) {
            $query->where('organizations.access_code', $request->get('access_code'));
        }

        return $query;
    }

    /**
     * @param Request $request
     * @return Organization
     * @throws Exception
     */
    public function create(Request $request): Organization
    {
        $organization = new Organization();
        $organization->fill($request->all());
        if (!$organization->save()) {
            throw new Exception("組織の作成に失敗しました。");
        }
        return $organization;
    }

    /**
     * @param Organization $organization
     * @param Request $request
     * @return Organization
     * @throws Exception
     */
    public function update(Organization $organization, Request $request): Organization
    {
        $organization = $organization->fill($request->all());
        if (!$organization->update()) {
            throw new Exception("組織情報の更新に失敗しました。");
        }
        return $organization;
    }
}
