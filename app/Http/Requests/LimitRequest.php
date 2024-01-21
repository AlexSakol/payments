<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LimitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date|before_or_equal:2100/01/01|after_or_equal:2000/01/01',
            'price' => 'required|decimal:2|between:0.01,10000000'
        ];
    }

    public function messages(): array
    {
        return [
            'price.required' => 'Поле "Сумма" должно быть заполнено',
            'price.decimal' => 'Сумма должна быть в формате ХХХХХХХХ.ХХ',
            'price.between' => 'Сумма должна быть в диапазоне от 0,01 до 10000000',
            'date.required' => 'Поле "Месяц и год" должно быть заполнено',
            'date.date' => 'Некорректный формат даты',
            'date.before_or_equal' => 'Максимальное значение даты 01.01.2100',
            'date.after_or_equal' => 'Минимальное значение даты 01.01.2000',
        ];
    }
}
