<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Suport\Facades\Input;
use Validator;

class DetailRequest extends FormRequest
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
        // $id = $this->user;
        return [
            'sex' => 'required',
            'religion' => 'required',
            'card' => 'required',
            'last_edu' => 'required',
            'majors' => 'required',
            'edu_place' => 'required',
            'photo' => 'required',
            'cv' => 'required',
        ];
    }
}
