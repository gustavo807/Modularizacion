<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/alivetech/res/img/AliveTech-Logo.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->nombre }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{-- trans('adminlte_lang::message.search') --}}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">Asesor</li>-->
            <!-- Optionally, you can add icons to the links -->

            <li class="active" id="principal"><a href="{{ url('asesor') }}"><i class='fa fa-user-circle'></i> <span>Asesor</span></a></li>
            <li class=""><a href="/asesorempresa"><i class='fa fa-address-book-o'></i> <span>Empresas</span></a></li>
            <li class=""><a href="/aproyectosgnrl"><i class='fa fa-folder-open-o'></i> <span>Proyectos</span></a></li>
            <li class=""><a href="/cuestionarios"><i class='fa fa-file-text'></i> <span>Cuestionarios</span></a></li>
            @if (Auth::user()->rol_id == 3)
              <li class=""><a href="/asesoradd"><i class='fa fa-user-plus'></i> <span>Agregar Asesores</span></a></li>

              <li class="treeview">
                  <a href="#"><i class='fa fa-money'></i> <span>Convocatorias</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="/asesorprograma">Programa</a></li>
                      <li><a href="/asesorinstitucion">Institucion</a></li>
                      <li><a href="/asesorconvocatoria">Convocatoria</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#"><i class='fa fa-suitcase'></i> <span>Modulos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="/asesorclasificacion">Clasificaciones</a></li>
                      <li><a href="/asesormodulo">Modulos</a></li>
                      <li><a href="/asesorclave">Claves</a></li>
                      <li><a href="/asesorparrafo">Parrafos</a></li>
                      <li><a href="/asesorimagen">Imagenes</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#"><i class='fa fa-sort-alpha-asc'></i> <span>Ordenar Modulos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="/aordenagnrl">Modulos Generales</a></li>
                      <li><a href="/aordenagnrl/create">Modulos por Convocatoria</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#"><i class='fa fa-folder-open-o'></i> <span>Documentos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="/asesorcategoria">Categorias</a></li>
                      <li><a href="/asesordocumentos">Documentos</a></li>
                  </ul>
              </li>
            @endif

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
