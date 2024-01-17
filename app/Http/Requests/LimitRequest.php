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
            'start_date' => 'required|date|before_or_equal:end_date|after_or_equal:2000/01/01',
            'end_date' => 'required|date|before_or_equal:2100/01/01|after_or_equal:2000/01/01',
            'price' => 'required|decimal:2|between:0.01,10000000'
        ];
    }

    public function messages(): array
    {
        return [
            'price.required' => 'Поле "Сумма" должно быть заполнено',
            'price.decimal' => 'Сумма должна быть в формате ХХХХХХХХ.ХХ',
            'price.between' => 'Сумма должна быть в диапазоне от 0,01 до 10000000',
            'start_date.required' => 'Поле "Начальная дата" должно быть заполнено',
            'start_date.date' => 'Некорректный формат начальной даты',
            'start_date.before_or_equal' => 'Максимальное значение начальной даты должно быть меньше конечной даты',
            'start_date.after_or_equal' => 'Минимальное значение начальной даты 01.01.2000',
            'end_date.required' => 'Поле "Конечная дата" должно быть заполнено',
            'end_date.date' => 'Некорректный формат конечной даты',
            'end_date.before_or_equal' => 'Максимальное значение конечной даты 01.01.2100',
            'end_date.after_or_equal' => 'Минимальное значение конечной даты 01.01.2000'
        ];
    }
}
