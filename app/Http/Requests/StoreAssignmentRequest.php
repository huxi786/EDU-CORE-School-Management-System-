<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today',
            'total_marks' => 'required|integer|min:1',
            'school_class_id' => 'required|exists:school_classes,id', 
        ];
    }

     public function messages(): array
    {
        return [
            'due_date.after' => 'The deadline must be a future date.',
            'school_class_id.exists' => 'Please select a valid class.'
        ];
    }
}
