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
        $id = data_get($attributes, 'id');
        $delete = data_get($attributes, 'delete');
        if ($id) {
            $entity = Department::query()
                ->organization($organization_id)
                ->where('departments.id', $id)
                ->first();
            if (!$entity) {
                throw new Exception();
            }
            if ($delete) {
                if (!$entity->delete()) {
                    throw new Exception();
                }
            }
        } else {
            $entity = new Department();
            $entity->organization_id = $organization_id;
        }
        $seq = data_get($attributes, 'seq');
        $name = data_get($attributes, 'name');
        $entity->department_id = $department_id;
        $entity->seq = $seq;
        $entity->name = $name;
        if (!$entity->save()) {
            throw new Exception();
        }
        $departments = data_get($attributes, 'departments');
        if ($departments) {
            foreach ($departments as $department) {
                $this->makeDepartment($organization_id, $entity->id, $department);
            }
        }
    }
}
