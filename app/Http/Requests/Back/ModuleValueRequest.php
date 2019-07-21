<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ModuleValueRequest extends FormRequest
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
            'mId' => 'required',
            'vName' => 'required',
            'vEnName' => 'required',
            'sort' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'mId.required' => 'mid 必须填写',
            'vName.required' => '权限名称必须填写',
            'vEnName.required' => '权限英文名必须填写',
            'sort.required' => '排序必须填写为数字',
        ];
    }
    
}
