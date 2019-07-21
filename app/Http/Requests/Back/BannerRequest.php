<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'bannerName' => 'required',
            'bannerTypeId' => 'required',
            'bannerUrl' => 'required|url',
            'sort' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'bannerName.required' => '标题必填',
            'bannerTypeId.required' => '类型必选',
            'bannerUrl.required' => 'url必填',
            'bannerUrl.url' => 'url格式错误',
            'sort.required' => 'sort必填',
            'sort.integer' => 'sort必选为整数',
        ];
    }
}
