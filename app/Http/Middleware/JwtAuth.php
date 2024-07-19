<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepositoryInterface;
use Auth;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Hash;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $jwt = $request->get('tkn');
        if ($jwt) {
            try {
                // JWTトークンをデコード、ユーザー認証情報を取得
                $jwt_decoded = JWT::decode($jwt, new Key(env('SALT_OF_JWT'), 'HS256'));
                $user_auth_json = openssl_decrypt($jwt_decoded->sub, 'AES-128-ECB', env('SALT_OF_JWT'));
                if (!$user_auth_json) {
                    throw new Exception('【JWTログイン処理】ユーザーID取得エラー');
                }
                $user_auth_array = json_decode($user_auth_json, true);
                $login_code = data_get($user_auth_array, 'login_code');
                $keycode = data_get($user_auth_array, 'keycode');

                // 必須項目
                if (!(
                    $login_code &&
                    $keycode
                )) {
                    throw new Exception('必須項目が不足しています。');
                }

                // ユーザー検索
                $userRepository = app('App\Repositories\UserRepositoryInterface');
                $user = $userRepository
                    ->search(new Request(['login_code' => $login_code]))
                    ->first();
                if (!$user) {
                    throw new Exception('ユーザーが見つかりませんでした。');
                }

                // ユーザー認証
                if(!Hash::check($keycode, $user['keycode'])) {
                    throw new Exception('ユーザー認証に失敗しました。');
                }

                // ログイン
                Auth::login($user);
            } catch (Exception $e) {
                // ログイン認証失敗
                return redirect(config('url.retech_portal') . "/login/workun");
            }
        }
        return $next($request);
    }
}
