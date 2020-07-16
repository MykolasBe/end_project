<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Waavi\Sanitizer\Sanitizer;

class JobRequest extends FormRequest
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
            'title' => 'required|string|max:150',
            'client_description' => 'required|string|max:1000',
            'description' => 'required|string|max:1000',
            'requirements' => 'required|string|max:1000',
            'advantages' => 'string|max:1000',
            'offer' => 'required|string|max:1000',
            'location' => 'required|string|max:150',
            'img' => 'required|string|url',
        ];
    }


    public function sanitizedInputs():array
    {
        $sanitized = (new Sanitizer($this->validated(),[
            'title' => 'trim|escape',
            'client_description' => 'trim|escape',
            'description' => 'trim|escape',
            'requirements' => 'trim|escape',
            'advantages' => 'trim|escape',
            'offer' => 'trim|escape',
            'location' => 'trim|escape',
            'img' => 'trim|escape',
        ]))->sanitize();
            // img file doenst need sanitze
        return [
            'title' => $sanitized['title'],
            'client_description' => $sanitized['client_description'],
            'description' => json_encode([
                'description' => explode("||" ,$sanitized['description']),
                'requirements' => explode("||" ,$sanitized['requirements']),
                'advantages' => explode("||" ,$sanitized['advantages']),
                'offer' => explode("||" ,$sanitized['offer']),
            ]),
            'location' => $sanitized['location'],
            'img' => $sanitized['img']
        ];
    }
}
