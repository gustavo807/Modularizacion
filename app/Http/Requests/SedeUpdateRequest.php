<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SedeUpdateRequest extends FormRequest
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
            'foto' => 'image',
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'max:255',
            'estado' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'paginaweb' => 'required|max:255',
            'direccion' => 'required|max:255',
            'linkgooglemaps' => 'required|max:255',
            'descripcion' => 'required|max:6000',
            'contacto' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo' => 'required|email|max:255',
            'institution_id' => 'required|max:255'
        ];
    }
}
