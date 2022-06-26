<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users,email,'.$this->user->id,
            'gender' => 'required|integer',
            'surname' => 'required|string',
            'age' => 'required|integer',
            'patronymic' => 'required|string',
            'surname' => 'required|string',
            'age' => 'required|integer',
            'patronymic' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Это поле необходимо для заполнения',
            'email' => 'Введите email',
            'email.unique' => 'Такой email уже существует',
        ];
    }
}
