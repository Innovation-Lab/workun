<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\OrganizationRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Organization;
use Exception;

class OrganizationController extends Controller
{
    private OrganizationRepositoryInterface $organization_repository;

    /**
     * @param OrganizationRepositoryInterface $organization_repository
     */
    public function __construct(
        OrganizationRepositoryInterface $organization_repository
    )
    {
        $this->organization_repository = $organization_repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $organization = $this->organization_repository->search($request);
        if ($organization) {
            return response()->json([
                'organization' => $organization
            ]);
        }

        return response()->json([
            'error' => 'Organization not found'
        ], 404);
    }

    /**
     * Create the specified resource in storage.
     */
    public function store(Request $request)
    {
        try {
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
            $organization = $this->organization_repository->search($request);
            $organization = $this->organization_repository->update($organization, $request);
        } catch (Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 200);
        }

        return response()->json([
            'success' => '組織情報を更新しました。',
            'organization' => $organization
        ], 201);
    }
}
