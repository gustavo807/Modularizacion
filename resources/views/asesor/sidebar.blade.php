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
                      <li><a href="/asesorprograma"><i class="fa fa-circle-o"></i>Programa</a></li>
                      <li><a href="/asesorinstitucion"><i class="fa fa-circle-o"></i>Institucion</a></li>
                      <li><a href="/asesorconvocatoria"><i class="fa fa-circle-o"></i>Convocatoria</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#"><i class='fa fa-suitcase'></i> <span>Modulos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="/asesorclasificacion"><i class="fa fa-circle-o"></i>Clasificaciones</a></li>
                      <li><a href="/asesormodulo"><i class="fa fa-circle-o"></i>Modulos</a></li>
                      <li><a href="/asesorclave"><i class="fa fa-circle-o"></i>Claves</a></li>
                      <li><a href="/asesorparrafo"><i class="fa fa-circle-o"></i>Parrafos</a></li>
                      <li><a href="/asesorimagen"><i class="fa fa-circle-o"></i>Imagenes</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#"><i class='fa fa-sort-alpha-asc'></i> <span>Ordenar Modulos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="/aordenagnrl"><i class="fa fa-circle-o"></i>Modulos Generales</a></li>
                      <li><a href="/aordenagnrl/create"><i class="fa fa-circle-o"></i>Modulos por Convocatoria</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#"><i class='fa fa-folder-open-o'></i> <span>Documentos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="/asesorcategoria"><i class="fa fa-circle-o"></i>Categorias</a></li>
                      <li><a href="/asesordocumentos"><i class="fa fa-circle-o"></i>Documentos</a></li>
                  </ul>
              </li>
            @endif

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
