<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pId' => 'required',
            'modName' => 'required',
            'sort' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'pId.required' => '上级模块必须选择',
            'modName.required' => '模块名称必须填写',
            'sort.required' => '排序必须填写',
            'sort.integer' => '排序必须为数字',
        ];
    }
}
