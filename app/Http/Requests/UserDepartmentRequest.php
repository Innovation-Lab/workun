<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserDepartmentRequest extends FormRequest
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
        return [
            'user_id' => [
                'required',
                'array',
            ],
            'user_id.*' => [
                'required',
                'integer',
                Rule::unique('user_departments', 'user_id')->where(function ($query) {
                    return $query->where('department_id', $this->department);
                }),
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'ユーザーを選択してください。',
            'user_id.*.unique' => '選択されたユーザーは既にこの部署に登録されています。',
        ];
    }
}
