<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Period;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    /**
     * @param Request $request
     * @throws Exception
     */
    public function update(Request $request): void
    {
        $organization_id = $request->get('organization_id');
        $departments = data_get($request->get('departments'), "0.departments", []);
        foreach ($departments as $department) {
            $this->makeDepartment($organization_id, null, $department);
        }
    }

    private function makeDepartment ($organization_id, $department_id = null, $attributes): void
    {
        # 該当レコードの取得
        $id = data_get($attributes, 'id');
        if ($id) {
            $entity = Department::query()
                ->withTrashed()
                ->organization($organization_id)
                ->where('departments.id', $id)
                ->first();
            if (!$entity) {
                throw new Exception();
            }
        } else {
            $entity = new Department();
            $entity->organization_id = $organization_id;
        }

        # 削除処理
        $delete = data_get($attributes, 'delete');
        if ($delete) {
            if (!$entity->id) {
                // 新規の場合は個々で処理を止める
                return;
            } else {
                $this->deleteDepartment($entity);

            }
        }

        # 更新処理
        $seq = data_get($attributes, 'seq');
        $name = data_get($attributes, 'name');
        $entity->department_id = $department_id;
        $entity->seq = $seq;
        $entity->name = $name;
        if (!$entity->save()) {
            throw new Exception();
        }

        # 子要素の処理
        $departments = data_get($attributes, 'departments');
        if ($departments) {
            foreach ($departments as $department) {
                $this->makeDepartment($organization_id, $entity->id, $department);
            }
        }
    }

    private function deleteDepartment($department)
    {
        // 削除処理
        if (!$department->delete()) {
            throw new Exception();
        }

        # 子要素の削除処理
        foreach ($department->childDepartments as $childDepartment) {
            $this->deleteDepartment($childDepartment);
        }
    }
}
