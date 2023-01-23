<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:50'],
            'middlename' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'birthdate' => ['required', 'date'],
            'inn' => ['required', 'integer', 'digits:12', 'unique:employees'],
            'snils' => ['required', 'integer', 'digits:11', 'unique:employees']
        ];
    }
}
