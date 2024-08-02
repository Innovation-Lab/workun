<?php

namespace App\Http\Controllers;

use App;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BaseController extends Controller
{
    protected string $directory = "";
    protected string $model_name = "";
    protected $model;
    protected $repository;
    protected Authenticatable $auth_user;

    public function __construct()
    {
        if ($this->model_name) {
            $modelClass = ucfirst($this->model_name);
            $this->model = App::make("App\Models\\{$modelClass}");
            $this->repository = App::make("App\Repositories\\{$modelClass}RepositoryInterface");
        }
        $this->middleware(function ($request, $next) {
            $this->auth_user = Auth::user();
            return $next($request);
        });
    }

    /**
     * 一覧ページ
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $plural = Str::plural($this->model_name);
        return view("{$this->directory}.index", [
            'request' => $request,
            $plural => $this->repository
                ->search($request)
                ->organization($this->auth_user->organization_id)
                ->paginate(),
        ]);
    }

    /**
     * 詳細ページ
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        return view("{$this->directory}.show", [
            $this->model_name => $this->getEntity($id),
        ]);
    }

    /**
     * 編集ページ
     * @return View
     */
    public function add(): View
    {
        return view("{$this->directory}.add", [
            $this->model_name => new $this->model,
        ]);
    }

    /**
     * 更新処理
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        # バリデーション
        $modelClass = ucfirst($this->model_name);
        $requestClass = new ("\App\Http\Requests\\{$modelClass}Request");
        $validator = Validator::make(
            $request->all(),
            $requestClass->rules(),
            $requestClass->messages(),
            $requestClass->attributes()
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        # 更新処理
        DB::beginTransaction();
        try {
            $request->merge([
                'user_id' => $this->auth_user->id,
                'organization_id' => $this->auth_user->organization_id,
            ]);
            $entity = $this->repository->create($request);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(['alert' => $exception->getMessage()]);
        }
        DB::commit();

        // リダイレクト先を取得
        $route = $this->getRedirectRoute('edit', 'redirect_after_add');

        return redirect()
            ->route($route, $entity)
            ->with('success', '更新しました。');
    }

    /**
     * 編集ページ
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        return view("{$this->directory}.edit", [
            $this->model_name => $this->getEntity($id),
        ]);
    }

    /**
     * 更新処理
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $entity = $this->getEntity($id);

        # バリデーション
        $modelClass = ucfirst($this->model_name);
        $requestClass = new ("\App\Http\Requests\\{$modelClass}Request");
        $validator = Validator::make(
                $request->all(),
                $requestClass->rules(),
                $requestClass->messages(),
                $requestClass->attributes()
            );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        # 更新処理
        DB::beginTransaction();
        try {
            $request->merge(['organization_id' => $this->auth_user->organization_id]);
            $this->repository->update($entity, $request);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(['alert' => $exception->getMessage()]);
        }
        DB::commit();

        // リダイレクト先を取得
        $route = $this->getRedirectRoute('edit', 'redirect_after_edit');

        return redirect()
            ->route($route, $entity)
            ->with('success', '更新しました。');
    }

    /**
     * 削除処理
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $entity = $this->getEntity($id);

        # 削除処理
        DB::beginTransaction();
        try {
            $this->repository->delete($entity);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(['alert' => $exception->getMessage()]);
        }
        DB::commit();

        // リダイレクト先を取得
        $route = $this->getRedirectRoute('index', 'redirect_after_delete');

        return redirect()
            ->route($route)
            ->with('success', '削除しました。');
    }

    private function getEntity($id)
    {
        $entity = $this->model->find($id);
        if (!$entity) abort(404);
        if ($this->auth_user->cannot('view', $entity)) {
            abort(403);
        }
        return $entity;
    }

    private function getRedirectRoute(string $action, string $redirectProperty): string
    {
        if (property_exists($this, $redirectProperty) && $this->{$redirectProperty}) {
            return str_replace("/", ".", $this->{$redirectProperty});
        }

        return str_replace("/", ".", $this->directory) . ".$action";
    }
}
