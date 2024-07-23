<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SelfCheckSheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'hierarchy' => 'required',
            'title' => 'required|max:100',
            'period_id' => 'required',
            'method' => 'required',
            'check_days' => 'required',
            'rating_days' => 'required',
            'approval_days' => 'required',
            'self_check_sheet_items.*.title' => 'required|max:100',
            'self_check_sheet_items.*.self_check_sheet_items.*.title' => 'required|max:100',
            'self_check_sheet_items.*.self_check_sheet_items.*.self_check_sheet_items.*.title' => 'required|max:100',
            'self_check_sheet_items.*.self_check_sheet_items.*.self_check_sheet_items.*.movie_title' => 'max:30',
            'self_check_sheet_items.*.self_check_sheet_items.*.self_check_sheet_items.*.movie_url' => 'max:200',
        ];

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'hierarchy' => 'シート階層',
            'title' => 'シートタイトル',
            'period_id' => '評価期間',
            'method' => '評価方法',
            'check_days' => '入力期限',
            'rating_days' => '評価期限',
            'approval_days' => '承認期限',
            'self_check_sheet_items.*.title' => 'タイトル',
            'self_check_sheet_items.*.self_check_sheet_items.*.title' => 'タイトル',
            'self_check_sheet_items.*.self_check_sheet_items.*.self_check_sheet_items.*.title' => 'タイトル',
            'self_check_sheet_items.*.self_check_sheet_items.*.self_check_sheet_items.*.movie_title' => '動画タイトル',
            'self_check_sheet_items.*.self_check_sheet_items.*.self_check_sheet_items.*.movie_url' => '動画URL',
        ];
    }
}
