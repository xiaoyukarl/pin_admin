<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'roleId' => 'integer',
            'name' => 'required|min:4|max:16',
            'password' => 'required|min:6|max:24'
        ];
    }

    public function messages()
    {
        return [
            'roleId.integer' => '角色必须选择',
            'name.required' => '账号名称必填',
            'name.min' => '账号名称最少4个字符',
            'name.max' => '账号名称最大16个字符',
            'password.min' => '密码最少6位数',
            'password.required' => '密码必须填写',
            'password.max' => '密码最大24个字符',
        ];
    }
}
