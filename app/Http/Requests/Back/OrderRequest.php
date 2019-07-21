<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'type' => 'required',
            'title' => 'required',
            'destCity' => 'required',
            'starCity' => 'required',
            'departureTime' => 'required',
            'telephone' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => '类型必选',
            'title.required' => '标题必填',
            'destCity.required' => '目的城市必选',
            'starCity.required' => '出发城市必选',
            'departureTime.required' => '出发时间必须填写',
            'telephone.required' => '手机号必须填写',
            'content.required' => '内容必须填写',
        ];
    }
}
