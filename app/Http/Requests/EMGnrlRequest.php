<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EMGnrlRequest extends FormRequest
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
          $rules = [];

          foreach ($this->$request->get('valor') as $key => $val) {
            $rules['valor.'.$key] = 'required|max:255';
          }
          return $rules;
    }
}
