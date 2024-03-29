<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LimitRequest extends FormRequest
{
    /**
     * Позволяет делать запрос только авторизованному пользователю
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date|before_or_equal:2100/01/01|after_or_equal:2000/01/01',
            'price' => 'required|numeric|between:0,10000000'
        ];
    }

    /**
     * Сообщения об ошибках
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function messages(): array
    {
        return [
            'price.required' => 'Поле "Сумма" должно быть заполнено',
            'price.numeric' => 'Некорректный формат суммы',
            'price.between' => 'Сумма должна быть в диапазоне от 0 до 10000000',
            'date.required' => 'Поле "Месяц и год" должно быть заполнено',
            'date.date' => 'Некорректный формат даты',
            'date.before_or_equal' => 'Максимальное значение даты 01.01.2100',
            'date.after_or_equal' => 'Минимальное значение даты 01.01.2000',
        ];
    }
}
