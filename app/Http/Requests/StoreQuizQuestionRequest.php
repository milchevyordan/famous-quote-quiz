<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuizQuestionRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'question' => 'required|string|max:255',
            'is_binary' => 'boolean|required',
            'binary_correct_answer' => 'boolean|nullable|required_if:is_binary,true',
            'answers' => 'array|nullable|required_without:is_binary',
            'answers.*.answer' => 'nullable|string|max:255|required_without:is_binary',
            'answers.*.is_correct' => 'nullable|boolean|max:255|required_without:is_binary',
        ];
    }
}
