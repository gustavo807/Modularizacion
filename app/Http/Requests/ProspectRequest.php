<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProspectRequest extends FormRequest
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
          'pf_razon_social' => 'required|string',
          //'pf_rfc' => 'string',
          'pf_nombre_comercial' => 'required|string',
          /*'pf_pagina_web' => 'string',
          'giro' => 'alpha',
          'pf_empleados_imss' => 'string',
          'pf_facturacion_anterior' => 'numeric',
          'tamano_empresa' => 'alpha',
          'inicio_ops' => 'date_format:d/m/Y',*/
          'pf_sector' => 'string',
          'pf_prod_servs' => 'string',
          'pf_mat_primas' => 'string',
          'procesos' => 'string',
          'maquinaria' => 'string',
          'pf_software' => 'string',
          'pf_certificaciones' => 'string',
          'pf_clientes' => 'string',
          'pf_exports' => 'string',
          'producto' => 'string',
          //'pf_tier_num' => 'integer',
          /*'pf_tier_prod'=> 'string',*/
          'pf_nombre_titular' => 'string',
          'pf_puesto_titular' => 'string',
          'pf_tel_titular' => 'string',
          'pf_email_titular' => 'string',
          'pf_nombre_rep' => 'string',
          'pf_rfc_rep' => 'string',
          'pf_curp_rep' => 'string',
          'pf_tel_rep' => 'string',
          'pf_email_rep' => 'string',
          'pf_nombre_contacto' => 'string',
          'pf_puesto_contacto' => 'string',
          'pf_tel_contacto' => 'string',
          'pf_email_contacto' => 'string',
          'pf_calle_comercial' => 'string',
          'pf_num_ext_comercial' => 'string',
          'pf_num_int_comercial' => 'string',
          'pf_colonia_comercial' => 'string',
          'pf_cp_comercial' => 'string',
          'pf_estado_comercial' => 'string',
          'pf_ciudad_comercial' => 'string',
          'pf_calle_fiscal' => 'string',
          'pf_num_ext_fiscal' => 'string',
          'pf_num_int_fiscal' => 'string',
          'pf_colonia_fiscal' => 'string',
          'pf_cp_fiscal' => 'string',
          'pf_estado_fiscal' => 'string',
          'pf_ciudad_fiscal' => 'string',
          'pf_desc_necesidades' => 'string',
          'pf_monto_inv' => 'numeric',
          /*'fondos' => '',*/
        ];
    }

    public function messages()
{
    return [


            'pf_razon_social.required' => 'Por favor proporciona la razon social',
          //  'pf_nombre_comercial.required' => 'Por favor proporciona el nombre comercial.',
            'pf_empleados_imss.integer' => 'El número de empelados en el IMSS debe ser un número entero.',
            /*'pf_facturacion_anterior.numeric' => 'La facturación anterior debe ser un valor númerico.',
            'pf_tier_num.integer' => 'El Tier debe ser un numero entero.',
            'pf_nombre_titular.alpha_num' => 'El nombre del titular solo puede contener letras.',
            'pf_puesto_titular.alpha_num' => 'El puesto del titular solo puede contener letras y numeros.',
            'pf_email_titular.email' => 'El email del titular debe ser una dirección valida',
            'pf_nombre_rep.alpha_num' => 'El nombre del representante solo puede contener letras.',
            'pf_email_rep.email' => 'El email del representante debe ser una direccion valida',
            'pf_nombre_contacto.alpha_num' => 'El nombre del contacto solo puede contener letras.',
            'pf_nombre_contacto.alpha_dash' => 'El nombre del contacto solo puede contener letras.',
            'pf_puesto_contacto.alpha_num' => 'El puesto del contacto solo puede contener letras y numeros.',
            'pf_puesto_contacto.alpha_dash' => 'El puesto del contacto solo puede contener letras y numeros.',
            'pf_email_contacto.email' => 'El email del contacto debe ser una dirección valida.',
            'pf_num_ext_comercial.alpha_dash' => 'El número exterior de la dirección comercial solo puede contener letras y numeros.',
            'pf_num_int_comercial.alpha_dash' => 'El número interior de la dirección comercial solo puede contener letras y numeros.',
            'pf_colonia_comercial.alpha_num' => 'La colonia de la dirección comercial solo puede contener letras y numeros.',
            'pf_cp_comercial.numeric' => 'El CP de la dirección comercial no es valido.',
            'pf_num_ext_fiscal.alpha_num' => 'El número exterior de la dirección fiscal solo puede contener letras y numeros.',
            'pf_num_ext_fiscal.alpha_dash' => 'El número exterior de la dirección fiscal solo puede contener letras y numeros.',
            'pf_num_int_fiscal,alpha_num' => 'El número interior de la dirección fiscal solo puede contener letras y numeros.',
            'pf_num_int_fiscal.alpha_dash' => 'El número interior de la dirección fiscal solo puede contener letras y numeros.',
            'pf_cp_fiscal.numeric' => 'El CP de la dirección comercial no es valido.',
            'pf_estado_fiscal.alpha_num' => 'El estado de la dirección fiscal solo puede contener letras.',
            'pf_ciudad_fiscal.alpha_num' => 'La ciudad de la dirección fiscal solo puede contener letras.',
            'pf_monto_inv.numeric' => 'El monto de inversión debe ser un numero.',*/


    ];
  }

}
