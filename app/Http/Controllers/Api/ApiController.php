<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Hash;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->checkAccessKey($request);
            } catch (Exception $exception) {
                return response()->json(['errors' => $exception->getMessage()]);
            }
            return $next($request);
        });
    }

    /**
     * @param $request
     * @return void
     * @throws Exception
     */
    private function checkAccessKey ($request): void
    {
        // アクセスコード
        $access_key = $request->get('workun_access_key');
        $secret_key = $request->get('workun_secret_key');

        // 必須項目
        if (!(
            $access_key &&
            $secret_key
        )) {
            throw new Exception('必須項目が不足しています。');
        }

        // 組織認証
        if(!(
            $access_key === env('WORKUN_ACCESS_KEY') &&
            Hash::check($secret_key, env('WORKUN_SECRET_KEY'))
        )) {
            throw new Exception('組織認証に失敗しました。');
        }
    }
}
