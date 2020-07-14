<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Waavi\Sanitizer\Sanitizer;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *J
     * @return array
     */
    public function rules()
    {
        return [
            'job_id' => 'nullable',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|unique:App\Application,email',
            'birth_date' => 'required|string|date',
            'location' => 'required|string|max:200',
            'education_degree' => 'required|string|integer',
            'education' => 'string|max:100',
            'languages' => 'required|string|max:100',
            'status' => 'required|string|max:150',
            'work_experience' => 'required|string|max:150',
            'work_from' => 'date|nullable',
            'work_to' => 'date|nullable',
        ];
    }


    public function sanitizedInputs():array
    {
        return (new Sanitizer($this->validated(),[
            'job_id' => 'trim|escape',
            'first_name' => 'trim|escape',
            'last_name' => 'trim|escape',
            'phone' => 'trim|escape',
            'email' => 'trim|escape',
            'birth_date' => 'trim|escape',
            'location' => 'trim|escape',
            'education_degree' => 'trim|escape',
            'education' => 'trim|escape',
            'languages' => 'trim|escape',
            'status' => 'trim|escape',
            'work_experience' => 'trim|escape',
            'work_from' => 'trim|escape',
            'work_to' => 'trim|escape',
        ]))->sanitize();

    }
}
