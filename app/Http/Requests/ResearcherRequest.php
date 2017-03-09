<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearcherRequest extends FormRequest
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
            'nombre' => 'required|max:255',
            'apellidopaterno' => 'required|max:255',
            'apellidomaterno' => 'required|max:255',
            'sexo' => 'required|max:255',
            'usuarioconacyt' => 'required|max:255',
            'correo' => 'required|max:255',
            'telefono' => 'required|max:255',
            'grado' => 'required|max:255',
            'campo' => 'required|max:255',
            'sni' => 'required|max:255',
            'informacion' => 'required|max:6000',
            'actividades' => 'required|max:2000',
            'entregables' => 'required|max:3900',
            'sede_id' => 'required|max:255'
        ];
    }
}
