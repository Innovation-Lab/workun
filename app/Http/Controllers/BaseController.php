<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function __construct()
    {
        if ($this->model_name) {
            $modelClass = ucfirst($this->model_name);
            $this->model = App::make("App\Models\\{$modelClass}");
            $this->repository = App::make("App\Repositories\\{$modelClass}RepositoryInterface");
        }
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
            $plural => $this->repository->search($request)->organization()->paginate(),
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
        return view("{$this->directory}.add");
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
            $this->repository->create($request);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(['alert' => $exception->getMessage()]);
        }
        DB::commit();

        return redirect()
            ->back()
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
            $this->repository->update($entity, $request);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(['alert' => $exception->getMessage()]);
        }
        DB::commit();

        return redirect()
            ->back()
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

        $index_route = str_replace("/", ".", $this->directory) . ".index";
        return redirect()
            ->route($index_route)
            ->with('success', '削除しました。');
    }

    private function getEntity($id)
    {
        $entity = $this->model->find($id);
        if (!$entity) abort(404);
        return $entity;
    }
}
