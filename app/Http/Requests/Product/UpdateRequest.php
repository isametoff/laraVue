<?php

namespace App\Http\Requests\Product;

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
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'is_published' => 'nullable',
            'category_id' => 'nullable',
            'tag_id' => 'nullable|array',
            'color_id' => 'nullable|array',
            'product_images' => 'nullable|array|between:3,6',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Это поле необходимо для заполнения',
            'email' => 'Введите email',
            'nullable' => 'nullable',
            'string' => 'string',
            'product_images.required' => 'Все поля с изображениями должны быть заполнены ',

        ];
    }
}
