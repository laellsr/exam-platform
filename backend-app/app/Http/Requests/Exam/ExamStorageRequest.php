<?php

namespace App\Http\Requests\Exam;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExamStorageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'name' => 'required|string',
            'questions' => 'array',
            'questions.*.name' => 'required_with:questions|string',
            'questions.*.versions' => 'required_with:questions|array',
            'questions.*.versions.*.question_type_id' => 'required_with:questions.*.versions|exists:question_types,id',
            'questions.*.versions.*.level' => 'required_with:questions.*.versions|integer|between:1,5',
            'questions.*.versions.*.description' => 'required_with:questions.*.versions|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 400));
    }
}
