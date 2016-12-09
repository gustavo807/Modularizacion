@extends('layouts.auth')

@section('htmlheader_title')
    Cuestionario de Prospección
@endsection

@section('content')
<body class="hold-transition register-page">
  <div class="form-box">
    @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors ->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session()->has('message'))
      <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>Alive</b>Tech</a>
    </div><!-- /.login-logo -->

      <div class="form-box-body">

          <h3>Formulario de Prospección de Proyectos</h3><br>
          <p>La información que usted nos proporciona es totalmente confidencial y será tratada conforme a lo establecido en nuestra <a href="/Privacy" target="_blank">Política de privacidad.</a></p><br>
        <form class="form-horizontal" method="post">
           <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                   <div class="form-group">
                    <label for="pf_razon_social" class="col-sm-4 control-label">Razón Social</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_razon_social" placeholder="Razón Social" name="pf_razon_social" value="{{ old('pf_razon_social') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_rfc" class="col-sm-4 control-label">RFC</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_rfc" placeholder="RFC" name="pf_rfc" value="{{ old('pf_rfc') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_nombre_comercial" class="col-sm-4 control-label">Nombre Comercial</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_nombre_comercial" placeholder="Nombre Comercial" name="pf_nombre_comercial" value="{{ old('pf_nombre_comercial') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_pagina_web" class="col-sm-4 control-label">Página Web</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_pagina_web" placeholder="pagina web" name="pf_pagina_web" value="{{ old('pf_pagina_web') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_giro" class="col-sm-4 control-label">Giro de la empresa</label>
                    <div class="col-sm-8">

                        <select id="pf_giro" name="pf_giro" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <option value="{{ old('pf_giro') }}"></option>
                          <option value="Industria">Industria</option>
                          <option value="Servicios">Servicios</option>
                          <option value="Comercio">Comercio</option>
                        </select>

                    </div>
                  </div>


                  <div class="form-group">
                    <label for="pf_empleados_imss" class="col-sm-4 control-label">Número de empleados en el IMSS</label>
                    <div class="col-sm-8">

                       <input type="number" class="form-control" id="pf_empleados_imss" name="pf_empleados_imss" placeholder="Número de empleados en el IMSS" value="{{ old('pf_empleados_imss') }}">

                        <!--<input type="text" class="form-control" id="pf_empleados_imss" placeholder="Número de empleados en el IMSS" name="pf_empleados_imss" value="{{ old('pf_empleados_imss') }}">-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_facturacion_anterior" class="col-sm-4 control-label">Facturacion del año pasado</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <!--<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="pf_facturacion_anterior" name="pf_pf_facturacion_anterior" value="{{ old('pf_facturacion_anterior') }}">-->
                          <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="pf_facturacion_anterior" name="pf_facturacion_anterior" value="{{ old('pf_facturacion_anterior') }}">
                          <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_tamano_empresa" class="col-sm-4 control-label">Tamaño de la empresa</label>
                    <div class="col-sm-8">
                        <select id="pf_tamano_empresa" name="pf_tamano_empresa" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <option value="{{ old('pf_tamano_empresa') }}"></option>
                          <option value="PyME">PyME</option>
                          <option value="Grande">Grande</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_inicio_ops" class="col-sm-4 control-label">Fecha de Inicio de Operaciones</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="pf_inicio_ops" placeholder="Fecha de Inicio de Operaciones" name="pf_inicio_ops" value="{{ old('pf_inicio_ops') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_sector" class="col-sm-4 control-label">Sector al que pertenece</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_sector" placeholder="Sector al que pertenece" name="pf_sector" value="{{ old('pf_sector') }}">
                    </div>
                     </div>

                  <div class="form-group">
                    <label for="pf_prod_servs" class="col-sm-4 control-label">Productos y/o Servicios</label>
                    <div class="col-sm-8">
                        <textarea rows="5" class="form-control" id="pf_prod_servs" placeholder="Productos y/o Servicios" name="pf_prod_servs" value="{{ old('pf_prod_servs') }}"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_mat_primas" class="col-sm-4 control-label">Materias Primas</label>
                    <div class="col-sm-8">
                        <textarea rows="5" class="form-control" id="pf_mat_primas" placeholder="Materias Primas" name="pf_mat_primas" value="{{ old('pf_mat_primas') }}"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_procesos" class="col-sm-4 control-label">Principales Procesos</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" id="pf_procesos" placeholder="Ejemplos: Diseño CAD, Maquinados de precisión, Torneado CNC, Fresado CNC, Torneado convencional, Fresado convencional, Rectificado plano y/o cilíndrico, Corte ,Doblez, Soldadura, Pintura, Pailería, Tratamientos Térmicos, Estampado, Troquelado, Fundición, Electroerosión, Inyección de plástico, etc." name="pf_procesos" value="{{ old('pf_procesos') }}"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_maquinaria" class="col-sm-4 control-label">Maquinaria y Equipo de Laboratorio</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" id="pf_maquinaria" placeholder="Ejemplo: Centro de maquinados, Torno CNC, Fresadora, CNC, Torno convencional, Fresadora convencional, Rectificadora plana, Rectificadora cilíndrica, Sierra cinta, Dobladora, Máquina para soldar, Cepillo, Electroerosionadora, Inyectora de plástico, Máquina de medición por coordenadas, Comparador óptico, Comparador de alturas, Indicador de carátula, Bloques patrón, Micrómetro, Vernier, etc." name="pf_maquinaria" value="{{ old('pf_maquinaria') }}"></textarea>

                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_software" class="col-sm-4 control-label">Software</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" id="pf_software" placeholder="Software con el que cuenta en su empresa" name="pf_software" value="{{ old('pf_software') }}"></textarea>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_certificcaciones" class="col-sm-4 control-label">Certificaciones</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" id="pf_certificaciones" placeholder="Certificaciones con las que cuenta su empresa" name="pf_certificaciones" value="{{ old('pf_certificaciones') }}"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_clientes" class="col-sm-4 control-label">Clientes y Sectores a los que pretenecen</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" id="pf_clientes" placeholder="Clientes de su empresa y sectores a los que pertenecen" name="pf_clientes" value="{{ old('pf_clientes') }}"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_exports" class="col-sm-4 control-label">Exportaciones</label>
                    <div class="col-sm-8">
                        <textarea rows="5" class="form-control" id="pf_exports" placeholder="Productos que exporta su empresa" name="pf_exports" value="{{ old('pf_exports') }}"></textarea>
                    </div>
                  </div>

                   <hr>


                   <h4>Para el sector Automotriz:</h4>


                   <div class="form-group">
                    <label for="pf_producto" class="col-sm-4 control-label">Producto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_producto" placeholder="Producto" name="pf_producto" value="{{ old('pf_producto') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_tier_num" class="col-sm-4 control-label">Tier</label>
                    <div class="col-sm-8">
                        <!--<input type="text" class="form-control" id="pf_tier_num" placeholder="Tier" name="pf_tier_num" value="{{ old('pf_tier_num') }}">-->
                        <select id="pf_tier_num" name="pf_tier_num" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <option value="{{ old('pf_tier_num') }}"></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_tier_prod[]" class="col-sm-4 control-label">Tipo de Producto</label>
                    <div class="col-sm-8">
                        <label class="checkbox-inline">
                          <input name="pf_tier_prod[]" id="pf_tier_prod[]" type="checkbox" value="Equipo Original">Equipo Original
                        </label>
                        <label class="checkbox-inline">
                          <input name="pf_tier_prod[]" id="pf_tier_prod[]" type="checkbox" value="Indirecto">Indirecto
                        </label>
                        <label class="checkbox-inline">
                          <input name="pf_tier_prod[]" id="pf_tier_prod[]" type="checkbox" value="Aftermarket">Aftermarket
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pf_subsist[]" class="col-sm-4 control-label">Subsistema del Automóvil</label>
                    <div class="col-sm-3">
                        <label class="checkbox">
                          <input name="pf_subsist[]" id="pf_subsist[]" type="checkbox" value="Chasis">Chasis
                        </label>
                        <label class="checkbox">
                          <input name="pf_subsist[]" id="pf_subsist[]" type="checkbox" value="Carroceria">Carroceria
                        </label>
                        <label class="checkbox">
                          <input name="pf_subsist[]" id="pf_subsist[]" type="checkbox" value="Tren Motriz">Tren Motriz
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <label class="checkbox">
                          <input name="pf_subsist[]" id="pf_subsist[]" type="checkbox" value="Interiores">Interiores
                        </label>
                        <label class="checkbox">
                          <input name="pf_subsist[]" id="pf_subsist[]" type="checkbox" value="Exteriores">Exteriores
                        </label>
                        <label class="checkbox">
                          <input name="pf_subsist[]" id="pf_subsist[]" type="checkbox" value="Electrico-Electronico">Eléctrico-Electrónico
                        </label>
                    </div>
                  </div>                                                                                                                                           <hr>
                  <h4>Datos del titular de la empresa:</h4>

                   <div class="form-group">
                    <label for="pf_nombre_titular" class="col-sm-4 control-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_nombre_titular" placeholder="Nombre del Titular" name="pf_nombre_titular" value="{{ old('pf_nombre_titular') }}">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_puesto_titular" class="col-sm-4 control-label">Puesto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_puesto_titular" placeholder="Puesto del Titular de la empresa" name="pf_puesto_titular" value="{{ old('pf_puesto_titular') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_tel_titular" class="col-sm-4 control-label">Teléfono</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_tel_titular" placeholder="Teléfono del titular de la empresa" name="pf_tel_titular" value="{{ old('pf_tel_titular') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_email_titular" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_email_titular" placeholder="Email del titular de la empresa" name="pf_email_titular" value="{{ old('pf_email_titular') }}">
                    </div>
                  </div>
                  <hr>
                  <h4>Datos del Representante legal de la empresa:</h4>

                    <div class="form-group">
                    <label for="pf_nombre_rep" class="col-sm-4 control-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_nombre_rep" placeholder="Nombre del Representante Legal" name="pf_nombre_rep" value="{{ old('pf_nombre_rep') }}">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_rfc_rep" class="col-sm-4 control-label">RFC</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_rfc_rep" placeholder="Puesto del Representante Legal" name="pf_rfc_rep" value="{{ old('pf_rfc_rep') }}">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="pf_curp_rep" class="col-sm-4 control-label">CURP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_curp_rep" placeholder="Puesto del Representante Legal" name="pf_curp_rep" value="{{ old('pf_curp_rep') }}">
                    </div>
                  </div>                                                                                                                                                                    <div class="form-group">
                    <label for="pf_tel_rep" class="col-sm-4 control-label">Teléfono</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_tel_rep" placeholder="Teléfono del Representante Legal" name="pf_tel_rep" value="{{ old('pf_tel_rep') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_email_rep" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_email_rep" placeholder="Email del Representante Legal" name="pf_email_rep" value="{{ old('pf_email_rep') }}">
                    </div>
                  </div>

                   <hr>
                   <h4>Datos de Contacto de la empresa:</h4>                                                                                                                                                                                 <div class="form-group">
                    <label for="pf_nombre_contacto" class="col-sm-4 control-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_nombre_contacto" placeholder="Nombre del Contacto" name="pf_nombre_contacto" value="{{ old('pf_nombre_contacto') }}">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_puesto_contacto" class="col-sm-4 control-label">Puesto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_puesto_contacto" placeholder="Puesto del Contacto" name="pf_puesto_contacto" value="{{ old('pf_puesto_contacto') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_tel_contacto" class="col-sm-4 control-label">Teléfono</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_tel_contacto" placeholder="Teléfono del Contacto" name="pf_tel_contacto" value="{{ old('pf_tel_contacto') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_email_contacto" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_email_contacto" placeholder="Email del Contacto" name="pf_email_contacto" value="{{ old('pf_email_contacto') }}">
                    </div>
                  </div>                                                                                                                                           <hr>
                  <h4>Dirección Comercial:</h4>

                   <div class="form-group">
                    <label for="pf_calle_comercial" class="col-sm-4 control-label">Calle</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_calle_comercial" placeholder="Calle" name="pf_calle_comercial" value="{{ old('pf_calle_comercial') }}">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_num_ext_comercial" class="col-sm-4 control-label">Número Exterior</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_num_ext_comercial" placeholder="Número Exterior" name="pf_num_ext_comercial" value="{{ old('pf_num_ext_comercial') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_num_int_comercial" class="col-sm-4 control-label">Número Interior</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_num_int_comercial" placeholder="Número Interior" name="pf_num_int_comercial" value="{{ old('pf_num_int_comercial') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_colonia_comercial" class="col-sm-4 control-label">Colonia</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_email_comercial" placeholder="Colonia" name="pf_email_comercial" value="{{ old('pf_email_comercial') }}">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_cp_comercial" class="col-sm-4 control-label">C.P.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_cp_comercial" placeholder="Código Postal" name="pf_cp_comercial" value="{{ old('pf_cp_comercial') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_estado_comercial" class="col-sm-4 control-label">Estado</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_estado_comercial" placeholder="Estado" name="pf_estado_comercial" value="{{ old('pf_estado_comercial') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_ciudad_comercial" class="col-sm-4 control-label">Ciudad o Municipio</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_ciudad_comercial" placeholder="Ciudad o Municipio" name="pf_ciudad_comercial" value="{{ old('pf_ciudad_comercial') }}">
                    </div>
                  </div>

                  <hr>
                   <h4>Dirección Fiscal:</h4>

                    <div class="form-group">
                    <label for="pf_calle_fiscal" class="col-sm-4 control-label">Calle</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_calle_fiscal" placeholder="Calle" name="pf_calle_fiscal" value="{{ old('pf_calle_fiscal') }}">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_num_ext_fiscal" class="col-sm-4 control-label">Número Exterior</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_num_ext_fiscal" placeholder="Número Exterior" name="pf_num_ext_fiscal" value="{{ old('pf_num_ext_fiscal') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_num_int_fiscal" class="col-sm-4 control-label">Número Interior</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_num_int_fiscal" placeholder="Número Interior" name="pf_num_int_fiscal" value="{{ old('pf_num_int_fiscal') }}">
                    </div>
                  </div>                                                                                                                                            <div class="form-group">
                    <label for="pf_colonia_fiscal" class="col-sm-4 control-label">Colonia</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_email_fiscal" placeholder="Colonia" name="pf_email_fiscal" value="{{ old('pf_email_fiscal') }}">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="pf_cp_fiscal" class="col-sm-4 control-label">C.P.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_cp_fiscal" placeholder="Código Postal" name="pf_cp_fiscal" value="{{ old('pf_cp_fiscal') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_estado_fiscal" class="col-sm-4 control-label">Estado</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_estado_fiscal" placeholder="Estado" name="pf_estado_fiscal" value="{{ old('pf_estado_fiscal') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_ciudad_fiscal" class="col-sm-4 control-label">Ciudad o Municipio</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pf_ciudad_fiscal" placeholder="Ciudad o Municipio" name="pf_ciudad_fiscal" value="{{ old('pf_ciudad_fiscal') }}">
                    </div>
                  </div>

                  <hr>
                   <h4>Descripción Inicial del proyecto:</h4>

                   <div class="form-group">
                    <label for="pf_desc_necesidades" class="col-sm-4 control-label">Describa las necesidades de su empresa</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" id="pf_desc_necesidades" placeholder="Describa detalladamente sus necesidades, para poder encontrar el fondo mas adecuado para su empresa. Por ejemplo: Capacitación, Consultoría, Certificaciónes, Diseño, Insumos, Equipamiento, Infraestructura, Estrategias de comercialización, Software, Registros, Laboratorio, Instalaciones,etc." name="pf_desc_necesidades" value="{{ old('pf_desc_necesidades') }}"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_monto_inv" class="col-sm-4 control-label">Monto estimado de inversión</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="pf_monto_inv" name="pf_monto_inv" value="{{ old('pf_monto_inv') }}">
                          <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pf_fondos[]" class="col-sm-4 control-label">Seleccione los fondos que le interesaron</label>
                    <div class="col-sm-8">
                        <label class="checkbox">
                          <input name="pf_fondos[]" id="pf_fondos[]" type="checkbox" value="INADEM"><b>INADEM</b>.- Instituto nacional del emprendedor.
                        </label>
                        <label class="checkbox">
                          <input name="pf_fondos[]" id="pf_fondos[]" type="checkbox" value="PROSOFT"><b>PROSOFT</b>.-Programa para el desarrollo de la industria del software.
                        </label>
                        <label class="checkbox">
                          <input name="pf_fondos[]" id="pf_fondos[]" type="checkbox" value="PPCI"><b>PPCI</b>.-Programa para la productividad y competitividad industrial.
                        </label>
                        <label class="checkbox">
                          <input name="pf_fondos[]" id="pf_fondos[]" type="checkbox" value="FIT"><b>FIT</b>.-Fondo de innovación tecnológica.
                        </label>
                        <label class="checkbox">
                          <input name="pf_fondos[]" id="pf_fondos[]" type="checkbox" value="SAGARPA"><b>SAGARPA</b>.-Secretaría de agricultura, ganadería, desarrollo rural, pesca y alimentación.
                        </label>
                    </div>
                  </div>
                  <div class="col-xs-push-1">
                    <button type="submit" class="btn btn-primary col-sm-offset-2">Enviar</button>
                  </div>

        </form>


      </div><!-- /.form-box-body -->

  </div><!-- /.form-box -->
</body>
@endsection
