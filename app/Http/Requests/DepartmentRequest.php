<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'departments' => 'array',
        ];
        $this->addDepartmentRules($rules, $this->all(), 'departments');

        // 一番最初のseqとnameは組織情報なのでバリデーションをする必要がない
        unset($rules['departments.0.seq']);
        unset($rules['departments.0.name']);

        return $rules;
    }

    /**
     * Add validation rules for departments recursively.
     *
     * @param array $rules
     * @param array $data
     * @param string $prefix
     */
    private function addDepartmentRules(array &$rules, array $data, string $prefix)
    {
        if (!isset($data['departments'])) {
            return;
        }

        foreach ($data['departments'] as $index => $department) {
            if (isset($department['delete']) && $department['delete']) {
                continue; // 'delete'がtrueの場合はバリデーションをスキップ
            }
            $currentPrefix = "{$prefix}.{$index}";
            $rules["{$currentPrefix}.seq"] = 'required|integer';
            $rules["{$currentPrefix}.name"] = 'required|string';
            $rules["{$currentPrefix}.departments"] = 'array';

            if (isset($department['departments'])) {
                $this->addDepartmentRules($rules, $department, "{$currentPrefix}.departments");
            }
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        $attributes = [];
        $this->addDepartmentAttributes($attributes, $this->all(), 'departments');

        return $attributes;
    }

    /**
     * Add custom attributes for departments recursively.
     *
     * @param array $attributes
     * @param array $data
     * @param string $prefix
     */
    private function addDepartmentAttributes(array &$attributes, array $data, string $prefix)
    {
        if (!isset($data['departments'])) {
            return;
        }

        foreach ($data['departments'] as $index => $department) {
            $currentPrefix = "{$prefix}.{$index}";
            $attributes["{$currentPrefix}.seq"] = "順序";
            $attributes["{$currentPrefix}.name"] = "名前";

            if (isset($department['departments'])) {
                $this->addDepartmentAttributes($attributes, $department, "{$currentPrefix}.departments");
            }
        }
    }
}
