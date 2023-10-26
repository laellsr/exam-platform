<?php

namespace App\Http\Requests\Submission;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubmissionStorageRequest extends FormRequest
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
            'exam_id' => 'required|exists:exams,id',
            'register' => 'required|string',
            'name' => 'required|string',
            'score' => 'required|integer',
            'questions' => 'required|array',
            'questions.*.id' => 'required|exists:questions,id',
            'questions.*.answer' => 'required_with:questions.*.id|string',
            'questions.*.assert' => 'required_with:questions.*.id|boolean'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 404));
    }
}
