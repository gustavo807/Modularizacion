<?php

namespace App\Http\Controllers;

use App\ProspectForm;
use Illuminate\Http\Request;
use App\Http\Requests\ProspectRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProspectMail;


class ProspectController extends Controller
{

      public function prospeccion(){
        return view ('alivetech.prospeccion');
      }

      public function store(ProspectRequest $request, ProspectMail $mailer){

        $this->validate($request, [
            'pf_razon_social' => 'max:100',
            'pf_rfc' => 'max:100',
            'pf_nombre_comercial' => 'max:100',
            'pf_pagina_web' => 'max:100',
            'pf_giro' => 'max:10',
            'pf_empleados_imss' => 'max:8',
            'pf_facturacion_anterior' => 'max:20',
            'pf_tamano_empresa' => 'max:10',
            'pf_sector' => 'max:50',
            'pf_prod_servs' => 'max:2000',
            'pf_mat_primas' => 'max:2000',
            'pf_procesos' => 'max:2000',
            'pf_maquinaria'=> 'max:2000',
            'pf_software'=> 'max:2000',
            'pf_clientes' => 'max:2000',
            'pf_certificaciones'=> 'max:2000',
            'pf_exports'=> 'max:2000',
            'pf_producto' => 'max:100',
             'pf_nombre_titular' => 'max:80',
             'pf_puesto_titular' => 'max:50',
             'pf_tel_titular' => 'max:15',
             'pf_email_titular' => 'max:50',
             'pf_nombre_rep'=> 'max:80',
             'pf_rfc_rep'=> 'max:50',
             'pf_curp_rep' => 'max:50',
             'pf_tel_rep'=> 'max:15',
             'pf_email_rep'=> 'max:50',
             'pf_nombre_contacto' => 'max:80',
             'pf_puesto_contacto' => 'max:50',
             'pf_tel_contacto'=> 'max:15',
             'pf_email_contacto' => 'max:50',
             'pf_calle_comercial' => 'max:50',
             'pf_num_ext_comercial'=> 'max:10',
             'pf_num_int_comercial' => 'max:10',
             'pf_colonia_comercial' => 'max:50',
             'pf_cp_comercial' => 'max:10',
             'pf_estado_comercial' => 'max:50',
             'pf_ciudad_comercial' => 'max:50',
             'pf_calle_fiscal' => 'max:50',
             'pf_num_ext_fiscal'=> 'max:10',
             'pf_num_int_fiscal'=> 'max:10',
             'pf_colonia_fiscal'=> 'max:50',
             'pf_cp_fiscal'=> 'max:10',
             'pf_estado_fiscal'=> 'max:50',
             'pf_ciudad_fiscal'=> 'max:50',
             'pf_desc_necesidades'=> 'max:3000',
             'pf_monto_inv'=> 'max:10',
        ]);


       if (!empty($_POST['pf_tier_prod'])) {
           $checkBoxA = implode(', ', $_POST['pf_tier_prod']);
           }
       else
           $checkBoxA = "Null";

       if (!empty($_POST['pf_subsist'])) {
           $checkBoxB = implode(', ', $_POST['pf_subsist']);
           }
       else
           $checkBoxB = "Null";

       if (!empty($_POST['pf_fondos'])) {
           $checkBoxC = implode(', ', $_POST['pf_fondos']);
           }
       else
           $checkBoxC = "Null";

       if (!empty($_POST['pf_inicio_ops'])) {
             $inicio_ops = $_POST['pf_inicio_ops'];
           }
       else
            $inicio_ops = '1111-01-01';


       $prospect_form = new ProspectForm(array(

       'razon_social' => $request->get('pf_razon_social'),
       'rfc'=> $request->get('pf_rfc'),
       'nombre_comercial' => $request->get('pf_nombre_comercial'),
       'pagina_web' => $request->get('pf_pagina_web'),
       'giro' => $request->get('pf_giro'),
       'empleados_imss' => $request->get('pf_empleados_imss'),
       'facturacion_anterior' => $request->get('pf_facturacion_anterior'),
       'tamano_empresa' => $request->get('pf_tamano_empresa'),
       'inicio_ops' => $inicio_ops,
       'sector' => $request->get('pf_sector'),
       'prod_servs' => $request->get('pf_prod_servs'),
       'mat_primas' => $request->get('pf_mat_primas'),
       'procesos' => $request->get('pf_procesos'),
       'maquinaria' => $request->get('pf_maquinaria'),
       'software' => $request->get('pf_software'),
       'certificaciones' => $request->get('pf_certificaciones'),
       'clientes' => $request->get('pf_clientes'),
       'exports' => $request->get('pf_exports'),
       'producto' => $request->get('pf_producto'),
       'tier_num' => $request->get('pf_tier_num'),
       'tier_prod'=> $checkBoxA,
       'subsist' => $checkBoxB,
       'nombre_titular' => $request->get('pf_nombre_titular'),
       'puesto_titular' => $request->get('pf_puesto_titular'),
       'tel_titular' => $request->get('pf_tel_titular'),
       'email_titular' => $request->get('pf_email_titular'),
       'nombre_rep' => $request->get('pf_nombre_rep'),
       'rfc_rep' => $request->get('pf_rfc_rep'),
       'curp_rep' => $request->get('pf_curp_rep'),
       'tel_rep' => $request->get('pf_tel_rep'),
       'email_rep' => $request->get('pf_email_rep'),
       'nombre_contacto' => $request->get('pf_nombre_contacto'),
       'puesto_contacto' => $request->get('pf_puesto_contacto'),
       'tel_contacto' => $request->get('pf_tel_contacto'),
       'email_contacto' => $request->get('pf_email_contacto'),
       'calle_comercial' => $request->get('pf_calle_comercial'),
       'num_ext_comercial' => $request->get('pf_num_ext_comercial'),
       'num_int_comercial' => $request->get('pf_num_int_comercial'),
       'colonia_comercial' => $request->get('pf_colonia_comercial'),
       'cp_comercial' => $request->get('pf_cp_comercial'),
       'estado_comercial' => $request->get('pf_estado_comercial'),
       'ciudad_comercial' => $request->get('pf_ciudad_comercial'),
       'calle_fiscal' => $request->get('pf_calle_fiscal'),
       'num_ext_fiscal' => $request->get('pf_num_ext_fiscal'),
       'num_int_fiscal' => $request->get('pf_num_int_fiscal'),
       'colonia_fiscal' => $request->get('pf_colonia_fiscal'),
       'cp_fiscal' => $request->get('pf_cp_fiscal'),
       'estado_fiscal' => $request->get('pf_estado_fiscal'),
       'ciudad_fiscal' => $request->get('pf_ciudad_fiscal'),
       'desc_necesidades' => $request->get('pf_desc_necesidades'),
       'monto_inv' => $request->get('pf_monto_inv'),
       'fondos' => $checkBoxC,

        ));

       //$request->all();
       $prospect_form->save();
       $mailer->sendEmailProspect();
       flash('Gracias por contestar nuestro cuestionario. El personal de AliveTech se pondrá en contacto con usted');
       return redirect('/prospeccion');
   }

   public function listarCuestionarios()
   {
     $cuestionarios = ProspectForm::paginate(10);
     return view('cuestionarios.cuestionarios', ['cuestionarios'=>$cuestionarios]);
   }



}
