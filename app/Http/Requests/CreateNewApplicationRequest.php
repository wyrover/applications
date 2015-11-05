<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateNewApplicationRequest extends Request
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
            'first_name' => 'required',
            'surname' => 'required',
            'address_line1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'telephone' => 'required|number',
            'mobile' => 'required|number',
            'email' => 'required|email',
            'ni_number' => 'required'
        ];
    }
}
