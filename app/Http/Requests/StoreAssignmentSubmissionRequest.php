<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentSubmissionRequest extends FormRequest
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
            'submission_file'=>'required|file|mimes:pdf,doc,docx,jpg,png,zip|max:10240'
        ];
    }

    public function messages(): array
    {
        return [
            'submission_file.required' => 'Please upload a valid file.',
            'submission_file.file' => 'The uploaded file must be a valid file.',
            'submission_file.mimes' => 'The file must be a PDF, DOC, DOCX, JPG, PNG, or ZIP file.',
            'submission_file.max' => 'The file size must not exceed 10MB.'
        ];
    }
}
