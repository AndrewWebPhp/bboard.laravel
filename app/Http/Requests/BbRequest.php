<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BbRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'content' => 'required',
            'price' => 'required|numeric',
            // 'captcha' => 'required|captcha',
            'pic' => 'sometimes|image',
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'У товара должна быть цена',
            'required' => 'Заполните это поле11',
            'max' => 'Значенее не должно быть длинее :max символов',
            'numeric' => 'Введите число11',
            'captcha.required' => 'Введите текст с картинки',
            'captcha.captcha' => 'Введите корректный текст с картинки',
            'pic.image' => 'Загрузите изображение',
        ];
    }
}
