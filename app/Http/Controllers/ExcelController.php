<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\ProspectForm;
class ExcelController extends Controller
{


  public function exportarCuestionarios($type)
  {
    
  $datosDeExportacion = ProspectForm::get(['razon_social', 'rfc', 'nombre_comercial', 'pagina_web', 'giro', 'empleados_imss', 'facturacion_anterior', 'tamano_empresa', 'inicio_ops', 'sector', 'prod_servs', 'mat_primas', 'procesos', 'maquinaria', 'software', 'certificaciones', 'clientes', 'exports', 'producto', 'tier_num', 'tier_prod', 'subsist', 'nombre_titular',
  'puesto_titular', 'tel_titular', 'email_titular', 'nombre_rep', 'rfc_rep', 'curp_rep', 'tel_rep', 'email_rep', 'nombre_contacto', 'puesto_contacto', 'tel_contacto', 'email_contacto', 'calle_comercial', 'num_ext_comercial', 'num_int_comercial', 'colonia_comercial', 'cp_comercial', 'estado_comercial', 'calle_fiscal', 'num_ext_fiscal', 'num_int_fiscal',
  'colonia_fiscal', 'estado_fiscal', 'ciudad_fiscal', 'desc_necesidades', 'monto_inv', 'fondos'])->toArray();

    return Excel::create('Cuestionarios de Prospección', function($excel) use ($datosDeExportacion) {
      $excel->setTitle('Cuestionario de Prospección');
    $excel->sheet('Cuestionarios', function($sheet) use ($datosDeExportacion)
        {
      $sheet->fromArray($datosDeExportacion);
        });
        })->download($type);

  }
}
