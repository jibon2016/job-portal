<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreJobRequest extends FormRequest
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
            'job_title'=> ['required'],
            'company_name' => ['required'],
            'summary' => ['required'],
            'description' => ['required'],
            'requirement' => ['required'],
            'experience' => ['required'],
            'deadline' => ['required'],
            'vacancy' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'employment_type' => ['required'],
            'company_image' => ['required', File::types(['png', 'jpg', 'webp'])],
            'website' => ['required'],
        ];
    }
}
