<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'cityName' => 'required|max:24'
        ];
    }

    public function messages()
    {
        return [
            'cityName.required' => '城市必须填写',
            'cityName.max' => '最大24个字符'
        ];
    }
}
