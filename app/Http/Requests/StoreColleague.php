<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColleague extends FormRequest
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
           'name' => 'required|string',
           'surname' => 'required|string',
           'colleague' => 'sometimes|required|string',
           'boss' => 'required|string',
           'role' => 'required|array',
           'sex' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле нужно заполнить',
            'name.string'  => 'Поле должно быть строкой',
            'surname.required' => 'Поле нужно заполнить',
            'surname.string'  => 'Поле должно быть строкой',
            'colleague.required' => 'Поле нужно заполнить',
            'colleague.string'  => 'Поле должно быть строкой',
            'boss.required' => 'Поле нужно заполнить',
            'boss.string'  => 'Поле должно быть строкой',
            'role.required' => 'Поле нужно заполнить',
            'role.array'  => 'Поле должно быть массивом',
            'sex.required' => 'Поле нужно заполнить',
            'sex.string'  => 'Поле должно быть строкой',
        ];
    }
}
