<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;

class CodeCheckRequest extends FormRequest
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
            'code' => 'required|string|exists:reset_code_passwords',
        ];
    }
}
