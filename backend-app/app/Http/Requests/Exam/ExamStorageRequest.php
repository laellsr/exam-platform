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
            'questions' => 'sometimes|array',
            'questions.*.id'                => 'integer|exists:questions,id',
            'questions.*.question_type_id'  => 'required_without:questions.*.id|exists:question_types,id',
            'questions.*.description'       => 'required_without:questions.*.id|string',
            'questions.*.options'           => 'required_if:questions.*.question_type_id,>,2|json',
            'questions.*.answer'            => 'required_with:questions.*.options|string',
            'questions.*.level'             => 'required_without:questions.*.id|integer|between:1,5'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 400));
    }
}
