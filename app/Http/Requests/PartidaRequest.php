<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartidaRequest extends FormRequest
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
            'sede_id' => 'required|max:255',
            'descripcion' => 'required|max:6000',
            'precio' => 'required|max:255',
            'cambio' => 'required|max:255',
        ];
    }
}
