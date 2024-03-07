<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Позволяет делать запрос только авторизованному упользователю
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
            'name' => 'required|string|between:2,255',
            'price' => 'required|numeric|between:0,10000000',
            'date' => 'required|date|before_or_equal:2100/01/01|after_or_equal:2000/01/01',
            'category_id' => 'required|integer|min:1',
            'is_income' => 'required|bool'
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
            'name.required' => 'Поле "Наименование" должно быть заполнено',
            'name.string' => 'Наименование должно быть строкой',
            'name.between' => 'Наименование должно содержать от 2 до 255 символов',
            'price.required' => 'Поле "Сумма" должно быть заполнено',
            'price.numeric' => 'Некорректный формат суммы',
            'price.between' => 'Сумма должна быть в диапазоне от 0 до 10000000',
            'date.required' => 'Поле "Дата" должно быть заполнено',
            'date.date' => 'Некорректный формат даты',
            'date.before_or_equal' => 'Максимальное значение даты 01.01.2100',
            'date.after_or_equal' => 'Минимальное значение даты 01.01.2000',
            'category_id.required' => 'Не выбрана категория',
            'category_id.integer' => 'Неверный формат идентификатора категории',
            'category_id.min' => 'Неверное значение идентификатора категории',
            'is_income.required' => 'Не указан доход/расход',
            'is_income.bool' => 'Неверный формат поля доход/расход'
        ];
    }
}
