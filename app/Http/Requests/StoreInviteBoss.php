<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInviteBoss extends FormRequest
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
           'name' => 'sometimes|required|string',
           'surname' => 'sometimes|required|string',
           'email' => 'sometimes|required|email',
           'boss' => 'sometimes|required|string',
           'role' => 'sometimes|required|array',
           'sex' => 'sometimes|required|string',
           'key' => 'sometimes|required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле нужно заполнить',
            'name.string'  => 'Поле должно быть строкой',
            'surname.required' => 'Поле нужно заполнить',
            'surname.string'  => 'Поле должно быть строкой',
            'email.required' => 'Поле нужно заполнить',
            'email.email'  => 'Поле должно быть эл. адресом',
            'boss.required' => 'Поле нужно заполнить',
            'boss.string'  => 'Поле должно быть строкой',
            'role.required' => 'Поле нужно заполнить',
            'role.array'  => 'Поле должно быть массивом',
            'sex.required' => 'Поле нужно заполнить',
            'sex.string'  => 'Поле должно быть строкой',                                    
        ];
    }
}
