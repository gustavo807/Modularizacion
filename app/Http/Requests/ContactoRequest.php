<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            //'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

    // Mensages para cada campo
    public function messages()
    {
      return [
            'name.required' => 'Por favor proporcione su nombre',
            'email.required' => 'Por favor proporcione un email valido.',
            'message.required' => 'Escriba su mensaje',
            //'g-recaptcha-response.required' => 'Responda el captcha.'
          ];
    }
}
