<?php

namespace App\View\Components\Organizations;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class FormIndex extends Component
{
    public $organization_chart;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->organization_chart = $this->getOrganizationChart();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.organizations.form-index');
    }

    public function getOrganizationChart()
    {
        $user = Auth::user();
        $organization = $user->organization;
        $organization->departments = $this->buildDepartmentHierarchy($organization->departments()->get());

        return $organization;
    }

    private function buildDepartmentHierarchy($departments, $parentId = null)
    {
        $result = [];
        foreach ($departments as $department) {
            if ($department->department_id == $parentId) {
                $children = $this->buildDepartmentHierarchy($departments, $department->id);
                if ($children) {
                    $department->child_departments = $children;
                }
                $result[] = $department;
            }
        }

        return $result;
    }
}
