<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Waavi\Sanitizer\Sanitizer;

class JobApplicationRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
        ];
    }

    /**
     * sanitizes inputs
     * @return array
     */
    public function sanitizedInputs():array
    {
        return (new Sanitizer($this->validated(),[
            'email' => 'trim|escape',
        ]))->sanitize();

    }
}
